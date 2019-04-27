<div class="admin row">
	<?php $this->load->view( 'admin/admin_nav' ) ?>
    <div class="col content">
		<?php $this->load->view( 'admin/top_line' ) ?>


		<?php
		if ( count( $users ) > 1 ) :
			echo "მომხმარებელთა სია";
		else:
			echo "მომხმარებილს რედაქტირება";


		endif;


		foreach ( $users as $usr ):
			$url  = base_url( 'index.php/admin/dashboard/users/' . $usr->id );
			$url2 = base_url( 'index.php/admin/dashboard/del/' . $usr->id );
			echo "<p>";
			echo "<a href='$url'>$usr->username </a><a href='$url2'>x</a>";
			echo "</p>";
		endforeach; ?>

        <a href="#">
        <button>ახალი მომხმარებლის შექმნა</button>
        </a>

    </div>
</div>