<?php $this->view('iskelet/header'); ?>
    <div id="home">
        <h1>Yazılarım,</h1><hr />
        <ol class="posts">
            <?php foreach($posts as $post) : ?>
                <li>
                    <?php if($post["yazi_onecikan"]=="1"){ ?>
                        <b><a href="<?php echo site_url('/yazi/'.$post['yazi_url']); ?>"><?php echo $post['yazi_baslik']; ?></a></b>
                    <?php }else{ ?>
                        <a href="<?php echo site_url('/yazi/'.$post['yazi_url']); ?>"><?php echo $post['yazi_baslik']; ?></a>
                    <?php } ?>
                    » <i><span><?php echo $post["yazi_created_at"];?></span> 
                    » <a href="<?php echo site_url(); ?>kategori/<?php echo $post['kategori_url']; ?>"><?php echo $post['kategori_baslik']; ?></a> 
                    » <?php echo $this->yazilar_model->get_yorumlar_toplam($post["yazi_id"]); ?> Yorum </i>
                    <?php 
                    if ($post["yazi_etiketler"]) { 
                        $dizi = explode (",",$post["yazi_etiketler"]);
                        foreach(explode(',', $post["yazi_etiketler"]) as $etiket){
                            echo "<span class='etiket'>$etiket</span> ";
                        }   
                    }
                    //echo word_limiter(strip_tags($post["yazi_icerik"]),10);                               
                    ?> 
            <?php endforeach; ?> 
        </ol>
        <?php echo $this->pagination->create_links(); ?> 
    </div>
<?php $this->view('iskelet/footer'); ?>