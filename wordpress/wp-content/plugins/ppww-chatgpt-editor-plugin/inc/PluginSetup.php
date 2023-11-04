<?php

namespace PhpProbablyWrongWay;

class PluginSetup
{
	public function __construct(private readonly string $pluginFolderUrl)
	{
//		add_action('init', [$this, 'registerBlockType']);
		add_action('enqueue_block_editor_assets', [$this, 'registerBlockType']);
	}

	public function registerBlockType(): void
	{
//		register_block_type(__DIR__, ['render_callback' => [$this, 'renderCallback']]);
		wp_enqueue_script('ournewblocktype', $this->pluginFolderUrl . 'build/index.js', ['wp-blocks', 'wp-element']);
	}

	public function renderCallback(): string
	{
		return '<div>Render Callback Test</div';
	}
}