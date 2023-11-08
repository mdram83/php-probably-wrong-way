<?php

namespace PhpProbablyWrongWay;

class PluginSetup
{
	public function __construct(private readonly string $pluginFolderUrl)
	{
		add_action('init', [$this, 'registerBlockType']);
	}

	public function registerBlockType(): void
	{
		wp_register_style('chatgpt-block-style', $this->pluginFolderUrl . 'build/index.css');
		wp_register_script(
			'chatgpt-block-script',
			$this->pluginFolderUrl . 'build/index.js',
			['wp-blocks', 'wp-element', 'wp-editor']
		);

		register_block_type(
			'ppww/ppww-chatgpt-editor-plugin',
			[
				'editor_script' => 'chatgpt-block-script',
				'editor_style' => 'chatgpt-block-style',
				'render_callback' => [$this, 'renderCallback'],
			]
		);

		wp_localize_script('chatgpt-block-script', 'ppwwChatgptEditorPluginData', [
			'rootUrl' => get_site_url(),
			'nonce' => wp_create_nonce('wp_rest'),
		]);
	}

	public function renderCallback($attributes): string
	{
		// TODO considering escaping html as I expect some code coming back from chatgpt
		ob_start();
		echo '<pre>';
		var_dump($attributes);
		echo '</pre>';
		return ob_get_clean();
//		return '<div>Render Callback Test with attributes: '.var_export($attributes, true) . '</div';
	}
}