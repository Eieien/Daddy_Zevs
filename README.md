# DADDY ZEVS WEBSITE REPO YIPPEE
## HOW DO WE USE IT!?
1. DOWNLOAD GIT FROM https://git-scm.com
2. GO ON WITH THE SETUP AND INSTALLATION
3. WATCH THIS VIDEO FOR THE SETUP CUZ IM TOO LAZY
	- https://www.youtube.com/watch?v=CvUiKWv2-C0
4. BASICS
	1. Setup name and email for credit and identification of what each user did in the history
		- git config --global user.name "{name}"
		- git config -- global user.email "{email}"
	2. Initialize Git (Dont do this when you already Cloned the Git)
		- git Init -> Initialize the Git
	3. Cloning a directory or an entire github page
		- git clone {src url} -> src url can be found when u press  the drop done on code
		  ![[Wer to find Git src url]](images/Git-Clone.png)
	4. Check the status of your git
		- git status
	5.  Adding a file for your next commit or when your modifying
		- git add {file}
		- git add {file1} {file2} {./path/{file3}}
	6.  Unstaging a file when retaining the changes in the working directory
		- git reset {file}
	7. Commiting your staged content or modified file before pushing into github
		- git commit -m "{descriptive message}"
	8. Pushing your files to the remote repository at github
		- git push -u origin main
	9. Idk how the other commands work so just ask chatgpt or look online for more
    10. Getting certain files
        - git fetch origin
        - git checkout origin/main -- {file1} {filepath/file2}
    11. Remembering Credentials (since every time you push, git will ask for your credentials)
        - git config --global credential.helper 'cache -- timeout={seconds}'
5. ![[CHEATSHEET]](https://education.github.com/git-cheat-sheet-education.pdf)
