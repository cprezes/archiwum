subst x: /D
subst x: "\\vmware-host\Shared Folders\Udostepniony"
RD /S /Q "X:\PHP\archiwum\"
xcopy "C:\xampp\htdocs\archiwum" "X:\PHP\archiwum\"  /y /s
del "X:\PHP\archiwum\kopiuj.cmd"
del "X:\PHP\archiwum\README.md"
del "X:\PHP\archiwum\.gitignore"
RD /S /Q "X:\PHP\archiwum\nbproject\"
