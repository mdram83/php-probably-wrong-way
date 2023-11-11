### php-probably-wrong-way

## Introduction

# What is php-probably-wrong-way
This repository is my first approach to build a theme and plugin for WordPress.
It is used only for educational purpose, though I may consider to use this theme and plugin to run real blog.

# Theme
Theme is build using following template as visual baseline - https://html5up.net/future-imperfect.
Main idea is to make simple theme that allows me to publish programming related blog posts, build my portfolio and publish some auxiliary posts (aka Inspirations).
Theme setup requires some extra configuration that is described later in this document.

# Chat-gpt-editor Plugin
Plugin can be used independently of the Theme.
Plugin allows you to run conversation with ChatGPT when writing the blog post and display this conversation in nice way later on together with post content.
Also, here some minimal configuration is required.

## Configuration steps required to use php-probably-wrong-way theme and plugin in production:

# ppww-theme configuration steps
1. Copy ppww-theme into your /wp-content/themes/ folder.
2. Activate the theme.
3. Go to Appearance>Customize>Site Identity>Site Icon and chose one prepared for site (/ppww-theme/images/favicon.png)
4. Add tagline - short info what is this page about... For example 'A beginner's programming diary.'.
5. Install plugin - ACF for custom fields and add 'subtitle' field (100 chars) for Posts, Pages, Inspirations, Projects. Set to required.
6. Add page 'About' with slug 'about', excerpt (displayed on front page) and content (displayed on about page).

Next to regular content, consider adding following license information into About page:

a) Favicon (generated with https://favicon.io/favicon-generator/)
- Font Title: Raleway
- Font Author: Copyright 2010 The Raleway Project Authors (impallari@gmail.com), with Reserved Font Name "Raleway".
- Font Source: http://fonts.gstatic.com/s/raleway/v29/1Ptxg8zYS_SKggPN4iEgvnHyvveLxVvoooCPNLA3JC9c.ttf
- Font License: SIL Open Font License, 1.1 (http://scripts.sil.org/OFL))

b) Web Template: https://html5up.net/future-imperfect

7. Add empty page 'Blog' and 'Home', set them manually in Dashboard>Settings>Reading home as main and blog as blog index.
8. Add empty page 'Portfolio'
9. Add Taxonomy for 'Technologies' (single 'technology') (to be used with Project post type) and Add Technologies entries (Projects menu).
10. Add Taxonomy for 'Project Statuses' (single 'project-status') (to be used with Project post type) and Add Statuses entries (Projects menu).

Suggested statuses are: Idea, Discovery, Prototype, Development, Production, Closed, Cancelled.
Though there is no impact on any functionality, no matter what statuses are set up.

11. Add following ACF custom fields for Projects:
- production_link
- repository_link
- start_date (Y-m-d)*
- end_date (Y-m-d)
- featured (Checkbox 1, 0 default 0)*

* - set as mandatory

12. Add ACF custom group/field for Posts only with field related_project (reference to Published, Projects, non bi-directional, non mandatory).
13. Create and set as default 'Uncategorized' category for posts (if not better is from english default installation).
14. Start creating and publishing your own Content!

# ppww-chatgpt-editor-plugin configuration steps
1. Copy ppww-chatgpt-editor-plugin into your /wp-content/plugins/ folder.
2. Make sure you have a ChatGPT API Key available (see on OpenAI pages).
3. Setup your php server environment variable 'CHAT_GPT_API_KEY' to be equal to your ChatGPT API Key.
4. Activate the plugin
5. When writing a post add 'ChatGPT Conversation' block type and enjoy they conversation with ChatGPT!