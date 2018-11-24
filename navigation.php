        <nav id="nav">
            <div id="menu">
                <h3 class="menuarrow"><span>Menu</span></h3>
                <ul>
				
				<?php
				include("includes/config.php");			
				$main_menu_query = "select * from main_menu";
				$main_menu_result = mysql_query($main_menu_query);

				while($r = mysql_fetch_array($main_menu_result))
				{
	
				?>
				 <li><a href="<?php echo $r['mmenu_link'];?>" id="<?php echo $r['mmenu_id'];?>" ><?php echo $r['mmenu_name'];?></a>
				 <div>
				 <ul>
				<?php				 
				 $sub_menu_query = "select * from sub_menu where mmenu_id=".$r['mmenu_id'];
				 $sub_menu_result = mysql_query($sub_menu_query);
				 while($r1 = mysql_fetch_array($sub_menu_result))
				 {
					 
				?>
				  <li><a href="<?php echo $r1['smenu_link'];?>?Items=<?php echo $r1['0'];?>&Subname=<?php echo $r1['2'];?>&MenuCat=<?php echo $r1['1'];?>"><?php echo $r1['smenu_name'];?></a></li>
				 <?php 
				 } 
				?>
				 </ul>
				 </div>
				 </li>
				<?php
				}
				?>
				</ul>
            </div>
        </nav>
