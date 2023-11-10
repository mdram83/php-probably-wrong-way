# php-probably-wrong-way

Todos:
6. GPT Plugin
- handle empty chat on frontend
- handle not empty chat on frontend
- check how code examples are retunred and displayed, maybe I need to escape html in some cases or do some other stuff...
- add loading with timer to time-out
- block sending in case one request is in progress


Manual steps required to use php-probably-wrong-way theme and plugins in production:
1. After activating theme go to Appearance, Customize, Site Identity, Site Icon and chose one prepared for site.
2. Add tagline - short info what is this page about... 'A beginner's programming diary.'
3. Install plugin - ACF for custom fields and configure it (required subtitle in Pages)
3.1. 'subtitle' field (100 chars) for Posts, Pages, Inspirations, Projects
4. Add page 'About' with slug 'about', excerpt (displayed on front page) and content (displayed on about page).
5. Add empty page 'Blog' and 'Home', set them manually in Dashboard>Settings>Reading home as main and blog as blog index
6. Add empty page 'Portfolio'
7. Add Taxonomy for 'Technologies' (single 'technology') (to be used with Project post type) and Add Techonologies entries (Projects menu)
8. Add Taxonomy for 'Project Statuses' (single 'project-status') (to be used with Project post type) and Add Statuses entries (Projects menu)
9. Add following ACF custom fields for Projects: production_link, repository_link, *start_date (Y-m-d), end_date (Y-m-d), *featured (Checkbox 1, 0 default 0). * - mandatory
10. Add ACF custom group/field for Posts only: related_project (reference to Published, Projects, non bi-directional, non mandatory).
5. Create and set as default 'Uncategorized' category for posts (if not better is from english default installation)


Add proper license information (consider bottom of About page)
1. Favicon and Logo (generated with https://favicon.io/favicon-generator/)

This favicon was generated using the following font:

- Font Title: Raleway
- Font Author: Copyright 2010 The Raleway Project Authors (impallari@gmail.com), with Reserved Font Name "Raleway".
- Font Source: http://fonts.gstatic.com/s/raleway/v29/1Ptxg8zYS_SKggPN4iEgvnHyvveLxVvoooCPNLA3JC9c.ttf
- Font License: SIL Open Font License, 1.1 (http://scripts.sil.org/OFL))

2. Web Template: https://html5up.net/future-imperfect
3. Images when you will add them