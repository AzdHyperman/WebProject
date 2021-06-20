
<?php
if(! empty($result)) 
{
	//  echo json_encode($result);
foreach($result as  $k=> $v)
{
?>
			<!-- #2 -->
	<div class="postari-list-element" >
				<div class="postari-list-element_header"> 
				<?php echo "Username: ".$result[$k]["username"]." Rank: ".$result[$k]["rank"]." Categorie: ".$result[$k]["categorie"];?>
				</div> 
	<!-- element_header -->
					<p><?php echo $result[$k]["text"];?></p> 
						
				<div class="postari-list-element_footer">
				<!-- BUTOANELE -->
					<button>rating</button>
					<button onclick="replybutton">Comment</button> 
					<a class="btnEditAction"
                        href="index.php?action=edit-postare&post_id=<?php echo $result[$k]["post_id"]; ?>">
                        <i class="fa fa-pencil" ></i> Edit
                        </a>
                        <a class="btnDeleteAction" 
                        href="index.php?action=delete-postare&post_id=<?php echo $result[$k]["post_id"]; ?>" >
                        <i class="fa fa-trash"></i> Delete
                        </a>
					<button type="submit" name="stats">FINISH</button>
					<div class="status"><?php $status=$result[$k]["stats"]; echo "Status: ".$status;?></div>
			        <!-- STATUS 	 -->
			
				</div>
				<form id="add-comment" class="add-comment" action="index.php?action=add-comment" method="post">
				 <input type="hidden" name="post_id" value="<?php echo $result[$k]["post_id"]; ?>" required>
				 <!-- <?php echo $result[$k]["post_id"]; ?> -->
				 <textarea id="casuta-comment" name="comm" placeholder="add-comment"></textarea>
				 <button type="submit" name="comment">posteaza</button>
		 		</form>
	<!-- ELEMENT FOOTER  -->
		<!-- casuta comment  -->	
		<div class="replies" id="replies">
		 <?php require ("view/replies.php");?> 
	    </div>
		<!-- end replies -->
	</div>
<?php 
} 
// end foreach
}//end if empty
?>


			
	