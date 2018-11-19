                </div>
                <div class="w3-col l4">
                    <div class="w3-card w3-margin w3-margin-top">
                        <!--<img src="/w3images/avatar_g.jpg" style="width:100%">-->
                        <div class="w3-container w3-white">
                        <h4><b>Anıl Şenocak</b></h4>
                        <p>Just me, myself and I, exploring the universe of uknownment. I have a heart of love and a interest of lorem ipsum and mauris neque quam blog. I want to share my world with you.</p>
                        </div>
                    </div>
                    <hr>
                    <div class="w3-card w3-margin">
                        <div class="w3-container w3-padding"><h4>Kategoriler</h4></div>
                        <ul class="w3-ul w3-hoverable w3-white">
                            <?php 
                            foreach ($kategoriler as $kategori) {
                                echo "<a href='".site_url('/kategori/'.$kategori['kategori_url'])."'><li class='w3-padding-16 w3-hide-medium w3-hide-small'>
                                        <img src='".site_url()."assets/images/kategoriler/".$kategori['kategori_resim']."' alt='Image' class='w3-left w3-margin-right' style='width:50px'>
                                        <span class='w3-large'>".$kategori['kategori_baslik']."</span>
                                    </li></a>";
                            }
                            ?>
                        </ul>
                    </div>
                    <hr> 
                    <div class="w3-card w3-margin">
                        <div class="w3-container w3-padding"><h4>Yorumlar</h4></div>
                        <ul class="w3-ul w3-hoverable w3-white">
                            <?php  
                            foreach ($yorumlar as $yorum) {
                                echo "<li class='w3-padding-16 w3-hide-medium w3-hide-small'>
                                        <a href='".site_url('/yazi/'.$yorum['yazi_url'])."'>
                                            <span class='w3-large'>".$yorum['yorum_isim']."</span><br>
                                        </a>
                                        <span class='w3-large'>".date("d.m.Y",strtotime($yorum['yorum_created_at']))."</span>
                                    </li>";
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div><br>
        </div>
        <footer class="w3-container w3-dark-grey w3-padding-32 w3-margin-top">
            <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
        </footer>

    </body>
</html>