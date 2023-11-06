<?php

namespace PhpProbablyWrongWay;

class PluginRestApiHandler
{
	private string $apiKey;
	private string $endpoint;
	private array $headers;

	public function __construct()
	{
		$this->apiKey = PluginConfig::getChatGptApiKey();
		$this->endpoint = PluginConfig::getChatGptApiEndpoint();
		$this->headers = [
			'Content-Type: application/json',
			'Authorization: Bearer ' . $this->apiKey,
		];
		add_action('rest_api_init', [$this, 'registerRoutes']);
	}

	public function registerRoutes(): void
	{
		register_rest_route('ppww-chatgpt/v1', 'chat', [
			'methods' => 'GET',
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
//		$requestBody = $this->prepareRequestBody($data);
//		$response = $this->getResponse($requestBody);
//
//		if (is_wp_error($response)) {
//			return $response;
//		}
//
//		return $this->prepareResponseBody($response);

		return [
			'role' => 'assistant',
			'content' => 'API call answer to question: ' . $data['question'],
		];
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
					'content' => $data, // TODO rebuild depending on what I will send from editor
				],
			],
		]);
	}

	private function getResponse(string $requestBody): array|\WP_Error
	{
		return wp_remote_post($this->endpoint, ['headers' => $this->headers, 'body' => $requestBody]);
	}

	private function prepareResponseBody(array $response): array
	{
		$responseBody = wp_remote_retrieve_body($response);
		return json_decode($responseBody, true);
	}
}
