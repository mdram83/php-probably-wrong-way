<?php

namespace PhpProbablyWrongWay;

class PluginFrontendRender
{
	private array $messages;

	public function __construct($attributes)
	{
		$this->messages = $attributes['messages'] ?? [];
	}

	public function getContent(): string
	{
		if (!$this->messages) {
			return '';
		}

		$content = $this->getConversationHeader();
		foreach ($this->messages as $message) {
			$content .= $this->getConversationMessage($message);
		}
		$content .= $this->getConversationFooter();

		return $content;
	}

	private function getConversationHeader(): string
	{
		return '<div class="ppww-chatgpt-frontend"><h3>Let\'s ask the expert :)</h3>';
	}

	private function getConversationMessage(array $message): string
	{
		$className = 'ppww-chatgpt-frontend-' . $message['role'];
		$roleName = $message['role'] === 'user' ? get_the_author() : 'Chat GPT';
		$content = $this->stripTagsExceptCode($message['content']);

		return (
			'<blockquote class="' . $className . '">'
			. "<strong>$roleName</strong>"
			. $content
			. '</blockquote>'
		);
	}

	private function getConversationFooter(): string
	{
		return '</div>';
	}

	private function stripTagsExceptCode(string $content): string
	{
		$dom = new \DOMDocument();

		$dom->loadHTML(
			'<?xml encoding="UTF-8">' . strip_tags($content, '<pre><code>'),
			LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD
		);

		foreach ((new \DOMXPath($dom))->query('//code') as $codeNode) {
			$preNode = $dom->createElement('pre');
			$preNode->appendChild($codeNode->cloneNode(true));
			$codeNode->parentNode->replaceChild($preNode, $codeNode);
		}

		return $dom->saveHTML();
	}
}