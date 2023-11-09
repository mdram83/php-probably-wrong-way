<?php

namespace PhpProbablyWrongWay;

class PluginRestApiHandler
{
	public function __construct()
	{
		add_action('rest_api_init', [$this, 'registerRoutes']);
	}

	public function registerRoutes(): void
	{
		register_rest_route('ppww-chatgpt/v1', 'chat', [
			'methods' => 'POST',
			'callback' => [$this, 'handleChatRequest'],
			'permission_callback' => [$this, 'checkPermissions'],
		]);
	}

	public function checkPermissions(): bool
	{
		return current_user_can('edit_posts');
	}

	public function handleChatRequest(\WP_REST_Request $data): array|\WP_Error
	{
		$requestBody = $this->prepareRequestBody($data);
		$response = $this->getResponse($requestBody);

		if (is_wp_error($response)) {
			wp_send_json_error($response->get_error_message(), 502);
			exit();
		}

		$responseBody = $this->prepareResponseBody($response);

		if ($this->isChatGptError($responseBody)) {
			wp_send_json_error($responseBody['error']['message'], 502);
			exit();
		}

		return $responseBody;
	}

	private function prepareRequestBody(\WP_REST_Request $data): string
	{
		$messages = [['role' => 'system', 'content' => PluginConfig::getChatGptApiSystemContent()]];
		foreach ($data['previousMessages'] as $message) {
			$messages[] = $message;
		}
		$messages[] = ['role' => 'user', 'content' => $data['nextQuestion']];

		return json_encode(['model' => PluginConfig::getChatGptApiModel(), 'messages' => $messages]);
	}

	private function getResponse(string $requestBody): array|\WP_Error
	{
		$endpoint = PluginConfig::getChatGptApiEndpoint();
		$headers = [
			'Content-Type' => 'application/json',
			'Authorization' => 'Bearer ' . PluginConfig::getChatGptApiKey(),
		];
		return wp_remote_post($endpoint, ['headers' => $headers, 'body' => $requestBody, 'timeout' => 20]);
	}

	private function prepareResponseBody(array $response): array
	{
		$responseBody = wp_remote_retrieve_body($response);
		return json_decode($responseBody, true);
	}

	private function isChatGptError(array $responseBody): bool
	{
		return isset($responseBody['error']);
	}
}
