<div class="col-9 col-m-9 col-l-9">
    <div class="projects">
        <article class="post">
            <div class="post-media">
        <?php foreach ($ListPage as $key => $detail):?>
            <img id="imgDetailArticle" src="/public/imagesUpload/<?php echo $detail->main_picture?>">
            </div>
            <div class="post-content">


                <h2 class="title"><?php echo $detail->title?></h2>
                <div class="post-details">
                    <a href="#" class="post-date"><?php echo $detail->date_inserted?></a>
                    <a href="#" class="post-views">15 views</a>
                    <a href="#" class="post-comments">03 Comments</a>
                </div>
                <div class="the-content">

                    <?php echo $detail->content?>

                    <div class="post-footer">

                        <div class="post-share-wrap">
                            <div class="post-share">
                                <a href="#">
                                    <i class="fab fa-facebook"></i>
                                </a>
                                <a href="#">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#">
                                    <i class="fab fa-google-plus"></i>
                                </a>
                                <a href="#">
                                    <i class="fab fa-linkedin"></i>
                                </a>
                                <a href="#">
                                    <i class="fab fa-pinterest"></i>
                                </a>
                            </div>
                        </div>

                        <div class="cat">
                            <strong>Category:</strong><a href="#" rel="category tag"><?php echo $detail->category?></a>
                        </div>

                    </div>
                </div>
        <?php endforeach;?>


                <div id="comments">
                    <h2 class="title">04 Comments</h2>
                    <div class="comments-inner">
                        <ul class="comment-list">
                            <li class="comment">
                                <div class="comment-body">
                                    <div class="comment-avatar image" style="background-image: url(../public/images/avatar-150px.jpg);">
                                        <img alt="avatar" src="/public/images/Front/avatar-150px.jpg">
                                    </div>
                                    <div class="comment-context">
                                        <div class="comment-head">
                                            <h2 class="title">Kendy</h2>
                                            <span class="comment-date">July 6, 2017</span>
                                        </div>
                                        <div class="comment-content">
                                            <p>Design works within constraints. The Columban monks who crafted the Book</p>
                                        </div>
                                        <div class="reply">
                                            <span class="comment-reply"><a class="comment-reply-link" href="#">Reply</a></span>
                                        </div>
                                    </div>
                                </div>
                                <ul class="children">
                                    <li class="comment">
                                        <div class="comment-body">
                                            <div class="comment-avatar image" style="background-image: url(../public/images/avatar-150px.jpg);">
                                                <img alt="avatar" src="../public/images/Front/avatar-150px.jpg">
                                            </div>
                                            <div class="comment-context">
                                                <div class="comment-head">
                                                    <h2 class="title">Kendy</h2>
                                                    <span class="comment-date">July 6, 2017</span>
                                                </div>
                                                <div class="comment-content">
                                                    <p>Design works within constraints. The Columban monks who crafted the Book</p>
                                                </div>
                                                <div class="reply">
                                                    <span class="comment-reply"><a class="comment-reply-link" href="#">Reply</a></span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div id="respond" class="comment-respond">
                        <h2 class="title">Leave a Reply</h2>
                        <form action="#" method="post" class="comment-form contact">
                            <div class="contact-item form-name">
                                <input name="author" value="" type="text" placeholder="Your Name *">
                            </div>
                            <div class="contact-item form-email">
                                <input name="email" value="" type="text" placeholder="Your Email *">
                            </div>
                            <div class="contact-item form-url">
                                <input id="url" name="url" value="" type="text" placeholder="Website URL">
                            </div>
                            <div class="contact-item field-full form-message">
                                <textarea name="comment" placeholder="Your Comment ..."></textarea>
                            </div>
                            <div class="contact-item form-submit">
                                <input name="submit" type="submit" id="submit" class="submit" value="POST Comment">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </article>
    </div>
</div>