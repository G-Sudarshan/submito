<?php
    
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Zip extends CI_Controller {

        public function __construct()
        {
            parent::__construct();
            //$this->load->library('zip');
            $this->load->helper('download');
        }

        public function index()
        {
            if(!$this->session->userdata('admin_id'))
            
            {
                return redirect('login');
            }
            // $path = FCPATH."/assets/";

            // $this->zip->read_dir($path,FALSE);

            // // Download the file to your desktop. Name it "my_backup.zip"
            // $this->zip->download('SubMito_Backup.zip');
           

            // $this->zip->add_data($filename, $filedata); 
            
            // //Create zip file on server with name."example_backup.zip"
            // $this->zip->archive('/zippedfiles/example_backup.zip');  

            // //Download the file to your system. It will be named "example_backup.zip"
            // $this->zip->download('example_backup.zip');
            // $this->session->set_flashdata('sucess','Backup downloaded successfully');
            // return redirect('Admin');


//file name:compress.php
//Title:How to compress a Folder containing Sub-Folders and Files with PHP
//Date:6-12-2012
               $source=FCPATH."/assets/";// Path To the folder;
$destination=FCPATH.'/zips/SubMito_Backup.zip';// Path to the file and file name ; 
$this->ZipBackup($source,$destination);

    if (file_exists ( $destination ))
    {
    $data = file_get_contents ( $destination );
     //force download
     force_download ("SubMito_Backup_".date("Y-m-d-H-i-s").".zip", $data );
     unlink($destination);

     $this->session->set_flashdata('sucess','Backup downloaded successfully');
     return redirect('Admin');
 }else
 {
    echo "Error while dowloaing backup";
 }

        }

     
        function ZipBackup($source, $destination)
{
if (!extension_loaded('zip') || !file_exists($source)) {
    return false;
}

$zip = new ZipArchive();
if (!$zip->open($destination, ZIPARCHIVE::CREATE)) {
    return false;
}

if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
    DEFINE('DS', DIRECTORY_SEPARATOR); //for windows
} else {
    DEFINE('DS', '/'); //for linux
}


$source = str_replace('\\', DS, realpath($source));

if (is_dir($source) === true)
{
    $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($source), RecursiveIteratorIterator::SELF_FIRST);
    echo $source;
    foreach ($files as $file)
    {
        $file = str_replace('\\',DS, $file);
        // Ignore "." and ".." folders
        if( in_array(substr($file, strrpos($file, DS)+1), array('.', '..')) )
            continue;

        $file = realpath($file);

        if (is_dir($file) === true)
        {
            $zip->addEmptyDir(str_replace($source . DS, '', $file . DS));
        }
        else if (is_file($file) === true)
        {
            $zip->addFromString(str_replace($source . DS, '', $file), file_get_contents($file));
        }
        echo $source;
    }
}
else if (is_file($source) === true)
{
    $zip->addFromString(basename($source), file_get_contents($source));
}

return $zip->close();
}



public function db_backup()
{
    $this->load->dbutil();

$prefs = array(     
    'format'      => 'zip',             
    'filename'    => 'my_db_backup.sql'
    );


$backup =& $this->dbutil->backup($prefs); 

$db_name = 'db_backup-on-'. date("Y-m-d-H-i-s") .'.zip';
$save = 'zips/'.$db_name;

$this->load->helper('file');
write_file($save, $backup); 


//$this->load->helper('download');
force_download($db_name, $backup);

 unlink(FCPATH.$save);

     $this->session->set_flashdata('sucess','Backup downloaded successfully');
     return redirect('Admin');
}

    }