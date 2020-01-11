<?php

class FileUpload
{
    private $FileLocation = IMG_LOCATION . '/';
    private $FileSizeLimit = LIMIT_FILESIZE;
    private $FileExtension = FILE_EXTENSION;
    private $ErrorMessage;
    private $UploadResult;

    public function UploadFile($File)
    {
        $FileSize = $this->_FileSize($File);
        $FileExtension = $this->_CheckExtension($File);
        if ($FileSize == 0) {
            $this->UploadResult = array('status' => 1, 'file' => null);
        } else {
            $NewName = 'IMG_' . date('YmdHis') . '.' . $FileExtension['ext'];
            $FileTarget = $this->FileLocation . $NewName;
            $ErrorCheck = $this->_UploadErrorCheck($FileTarget, $FileSize, $FileExtension['status']);
            if ($ErrorCheck) {
                $this->UploadResult = array('status' => 0, 'error' => $this->ErrorMessage);
            } else {
                if (move_uploaded_file($File['tmp_name'], $FileTarget)) {
                    $this->UploadResult = array('status' => 1, 'file' => $NewName);
                } else {
                    $this->UploadResult = array('status' => 0, 'error' => 'failed');
                }
            }
        }
        return $this->UploadResult;
    }

    private function _UploadErrorCheck($FileLoc, $FileSize, $FileExt)
    {
        $UploadError = false;
        if (file_exists($FileLoc)) {
            $this->ErrorMessage = 'exist';
            $UploadError = true;
        }
        if ($FileSize > $this->FileSizeLimit) {
            $this->ErrorMessage = 'over';
            $UploadError = true;
        }
        if (!$FileExt) {
            $this->ErrorMessage = 'unmatch';
            $UploadError = true;
        }
        return $UploadError;
    }

    public function DeleteFile($File)
    {
        unlink($this->FileLocation . $File);
    }

    public function ReplaceFile($OldFile, $NewFile)
    {
        $this->DeleteFile($OldFile);
        $this->UploadFile($NewFile);
    }

    private function _FileSize($File)
    {
        return $File['size'];
    }

    private function _CheckExtension($File)
    {
        $ExplodeFileName = explode('.', $File['name']);
        $Extension = strtolower(end($ExplodeFileName));
        $TrueExtension = false;
        foreach ($this->FileExtension as $Ext) {
            if ($Ext == $Extension) {
                $TrueExtension = true;
            }
        }
        $ReturnExtension = array('status' => $TrueExtension, 'ext' => $Extension);
        return $ReturnExtension;
    }
}
