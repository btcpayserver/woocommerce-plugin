param (
    [string]$distfolder= "./dist/btcpay-for-woocommerce",
    [string]$svndir = "./../../Svn/btcpay-for-woocommerce",
    [string]$svnrepo = "https://plugins.svn.wordpress.org/btcpay-for-woocommerce",    
    [string]$svnuser,
    [string]$svnpassword
 )
pushd
$match = ([regex] 'Version:\W+(([0-9]+\.?)+)').Match((Get-Content ".\src\class-wc-gateway-btcpay.php"))
if (-not $match.Success) {
    Write-Host "Impossible to detect the version"
    Exit
}

$version = $match.Groups[1].Value

Write-Host "Deploying version $version"

.\docker-build.ps1

if ((-not (Test-Path $svndir) -or (-not (Test-Path ($svndir+ "/.svn")))) -and (-not($svnrepo) -or -not($svnuser) -or -not($svnpassword)) ) { 
    Write-Host "You need to either have a valid svn dir already authenticated or provide svn credentials" -foreground Red
    Exit
}

if (-not (Test-Path $svndir)){
    Write-Host "Creating svn dir at $svndir " -foreground Yellow
    New-Item -ItemType Directory -Path $svndir -Force | Out-Null
}



if(-not (Test-Path ($svndir+ "/.svn"))){

    Write-Host "Checking out svn" -foreground Yellow
    svn checkout $svnrepo $svndir
}

if (-not (Test-Path "$svndir\tags\$version")){
    Write-Host "Creating version dir at $svndir\tags\$version " -foreground Yellow
    New-Item -ItemType Directory -Path "$svndir\tags\$version" -Force | Out-Null
}
else {
    Write-Host "Dir at $svndir\tags\$version already exists, did you forget to bump the version?" -foreground Red
    Exit
}

Write-Host "Copying to trunk " -foreground Yellow
Copy-Item "$distfolder\*" "$svndir\trunk" -Force -Recurse

Write-Host "Copying to version " -foreground Yellow
Copy-Item "$distfolder\*" "$svndir\tags\$version" -Force -Recurse

Write-Host "Copying root readme " -foreground Yellow
Copy-Item "$distfolder\readme.txt" "$svndir\readme.txt" -Force

Set-Location -Path $svndir
Write-Host "Adding all new files to svn " -foreground Yellow
svn add --force * --auto-props --parents --depth infinity --no-ignore -q

Write-Host "Comitting" -foreground Yellow
svn commit -m "Bump to $version"

Write-Host "Pushign to SVN " -foreground Yellow
if(-not($svnuser) -or -not($svnpassword)){
    svn.exe update
}

svn update --username $svnuser --password $svnpassword

popd