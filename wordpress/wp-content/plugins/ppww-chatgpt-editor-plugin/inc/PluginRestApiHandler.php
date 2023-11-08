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

	public function handleChatRequest(\WP_REST_Request $data): array|\WP_Error|\WP_REST_Request|string // TODO remove request part from returned types after tests
	{
		$requestBody = $this->prepareRequestBody($data);
		$response = $this->getResponse($requestBody);

		if (is_wp_error($response)) {
			wp_send_json_error(null, 502);
		}

		$responseBody = $this->prepareResponseBody($response);

		if ($this->isChatGptError($responseBody)) {
			wp_send_json_error(['response' => $responseBody], 502);
		}

		return $responseBody;

//		return [
//			'role' => 'assistant',
//			'content' => 'API call answer to question: ' . $data['question'],
//		];
	}

	private function prepareRequestBody(\WP_REST_Request $data): string
	{
		return json_encode([
			'model' => PluginConfig::getChatGptApiModel(),
			'messages' => [
				[
					'role' => 'system',
					'content' => PluginConfig::getChatGptApiSystemContent(),
				],
				[
					'role' => 'user',
					'content' => $data['question'], // TODO rebuild depending on what I will send from editor
				],
			],
		]);
	}

	private function getResponse(string $requestBody): array|\WP_Error
	{
		$endpoint = PluginConfig::getChatGptApiEndpoint();
		$headers = [
			'Content-Type' => 'application/json',
//			'Authorization' => 'Bearer ' . PluginConfig::getChatGptApiKey(), // TODO uncomment after implmeneting gtp error handling

		];
		return wp_remote_post($endpoint, ['headers' => $headers, 'body' => $requestBody]);
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
