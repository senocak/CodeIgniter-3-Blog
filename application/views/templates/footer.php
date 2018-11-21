                </div>
                <div class="w3-col l4">
                    <div class="w3-card w3-margin w3-margin-top">
                    <img src="<?php echo base_url(); ?>assets/images/bg.gif" style="width:100%">
                        <div class="w3-container w3-white">
                            <h4><b>Anıl Şenocak</b></h4>
                            <p>Playing Guitar<br>
                            Reading Books<br>
                            Riding Motorcycle<br>
                            Traveling (Austria, Slovenia, Hungary, Italy, Croatia, Bosnia and Herzegovina, Netherlands)<br>
                            </p>
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
                                        <a href='".site_url('/yazi/'.$yorum['yazi_url'])."#yorum_".$yorum['yorum_id']."'>
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
            <p>Anıl Şenocak | <?php echo date("Y");?></p>
        </footer>
    </body>
</html>