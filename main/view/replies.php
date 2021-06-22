				 
  <!-- comentariile la o postare  -->
        <input type="hidden" name="post_id" value="<?php echo $result[$k]["post_id"]; ?>" required>
        <?php 		
        $post_id=$result[$k]["post_id"]; echo $post_id;
          $comments=$comment->getCommentsById($post_id);          
        if(!empty($comments) )
        {
                    //  echo json_encode($comments);
            foreach($comments as $k=>$v)
        {
            $reply_of=$comments[$k]["reply_of"];
            $replies=array();
            if($reply_of==0)
            {
        ?>

				<div class="reply_form">
                <div class="reply_header"><?php echo $comments[$k]["username"];?>
                </div>
		<!-- header  -->
                <p>
                <?php 
                    // echo json_encode($comments);
                $comm_id= $comments[$k]["comm_id"];
                echo $comm_id."<br>";
                echo $comments[$k]["text"]."<br>";					
                ?>	
                </p>
                <div class="reply_footer">
                    <button>rating</button>
                    <button>Comment</button>
                    <a class="btnDeleteComment" href="index.php?action=delete-comment&comm_id=<?php echo $comments[$k]['comm_id']?>">DELETE</a>
                </div>
		<!-- footer  -->
						<!-- casuta comment  -->
				 <form id="add-comment" class="add-comment" action="index.php?action=add-comment" method="post">
				 <input type="hidden" name="post_id" value="<?php echo $comments[$k]["post_id"]; ?>" required>
				 <input type="hidden" name="comm_id" value="<?php echo $comm_id;?>" required>
                 <textarea id="casuta-comment" name="comm" placeholder="add-reply"></textarea>
				 <button type="submit" name="reply">Reply</button>
				 </form>
                 <?php
                 
                 foreach($comments as $replykey=>$reply){
                 if($comments[$replykey]["reply_of"]==$comm_id){?>
                 <div class="replies">
                     <div class="reply_form">
                        <div class="reply_header"><?php echo $comments[$replykey]["username"]; ?> </div>
                         <p><?php echo $comm_id."<br>";
                                 echo $comments[$replykey]["text"];
                            ?> </p>
                        <div class="reply_footer">
                        <a class="btnDeleteComment" href="index.php?action=delete-comment&comm_id=<?php echo $comments[$replykey]['comm_id']?>">DELETE</a>
                        </div>
                     </div>
                 </div>
                 <?php
                 }
                }?>

				 </div> 
				 <!-- reply form  -->
                 <?php 
                }//check reply_of 
                } //foreach
				}
                ?>
				 
				