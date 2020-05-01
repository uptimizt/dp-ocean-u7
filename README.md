# dp-ocean-u7
Display Posts for OceanWP (theme for WordPress)


# examples

## 

[lop-square posts_per_page="5"]


## список постов - посты - по тегу

```
[dp tmpl="list-post.php" post_type="post" tag="tag1, tag2" posts_per_page="5"]
```

## таблица рейтинг - продукты - по тегу

```
[dp tmpl="rating-table.php" post_type="product" posts_per_page="5" taxonomy="product_tag" tax_term="temy-woocommerce"]
```

## таблица рейтинг - продукты - по ids
```
[dp tmpl="rating-table.php" post_type="product" id="36950, 47838, 49757" orderby="post__in"]
```
