<?= has_excerpt() ? get_the_excerpt() : wp_trim_words(get_the_content(), \PhpProbablyWrongWay\ThemeConfig::getContentToExcerptWordsCount()); ?>