<?php

namespace PhpProbablyWrongWay;

class PluginConfig
{
	private static string $chatGptApiEndpoint = 'https://api.openai.com/v1/chat/completions';
	private static string $chatGptApiModel = 'gpt-3.5-turbo';
	private static string $chatGptApiSystemContent = 'You are a helpful assistant.';

	public static function getChatGptApiEndpoint(): string
	{
		return static::$chatGptApiEndpoint;
	}

	public static function getChatGptApiKey(): string
	{
		return 'testKey'; // TODO read from ENV or wp-config
	}

	public static function getChatGptApiModel(): string
	{
		return static::$chatGptApiModel;
	}

	public static function getChatGptApiSystemContent(): string
	{
		return static::$chatGptApiSystemContent;
	}
}
