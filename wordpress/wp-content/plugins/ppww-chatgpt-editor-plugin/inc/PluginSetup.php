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
	}

	public function renderCallback($attributes): string
	{
		// TODO considering escaping html as I expect some code coming back from chatgpt
		ob_start();
		var_dump($attributes);
		return ob_get_clean();
//		return '<div>Render Callback Test with attributes: '.var_export($attributes, true) . '</div';
	}
}