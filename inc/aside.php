<aside class="aside">

<div class="inner">
    <h2>Recent Posts</h2>
    <?php foreach(get_all("posts","DESC") as $post) {  ?>
        <a href="single.php?post_id=<?= $post->id ?>"><?= limit_text(capitalize($post->title),40);  ?>&nbsp;<b style="color:red">More..</b>  </a>
    <?php } ?>
</div>

<div class="inner">
    <h2>Categories</h2>
    <?php foreach(get_all("categories") as $category) {  ?>
        <a href="category.php?cat_id=<?= $category->id ?>"><?=  uppercase($category->name); ?></a>
    <?php } ?>
</div>
</div>
</aside> 