subst z: /D
subst z: \\VBOXSVR\Udostepniony
RD /S /Q "z:\PHP\archiwum\"
xcopy "C:\xampp\htdocs\archiwum" "z:\PHP\archiwum\"  /y /s
del "z:\PHP\archiwum\kopiuj.cmd"
del "z:\PHP\archiwum\README.md"
del "z:\PHP\archiwum\.gitignore"
RD /S /Q "z:\PHP\archiwum\nbproject\"
