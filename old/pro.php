<?php
//output buffer


//create javascript progress bar

//initilize progress bar

//save progress to variable instead of a file

$temp_progress = '';
$targetFile = fopen( 'test.jpg', 'w' );
$ch = curl_init( 'https://images.pexels.com/photos/1591447/pexels-photo-1591447.jpeg?crop=entropy&cs=srgb&dl=photography-of-fall-trees-1591447.jpg&fit=crop&fm=jpg&h=1600&w=1280' );
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt( $ch, CURLOPT_NOPROGRESS, false );
curl_setopt( $ch, CURLOPT_PROGRESSFUNCTION, 'progressCallback' );
curl_setopt( $ch, CURLOPT_FILE, $targetFile );
curl_exec( $ch );
fclose( $targetFile );
//must add $resource to the function after a newer php version. Previous comments states php 5.5
function progressCallback( $resource, $download_size, $downloaded_size, $upload_size, $uploaded_size )
{

    static $previousProgress = 0;
    
    if ( $download_size == 0 ) {
        $progress = 0;
    } else {
        $progress = round( $downloaded_size * 100 / $download_size );
	}
    
    if ( $progress > $previousProgress)
    {
        $previousProgress = $progress;
        $temp_progress = $progress;
    }
    file_put_contents("progress.txt",$progress);
}


echo "yeah";
?>
