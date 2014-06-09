Git常用命令

[基本配置]
git config --global user.name "Your Name"
git config --global user.email "email@example.com"
** --global 参数表示，这台机器上所有的Git仓库都会使用这个配置

[创建仓库]
git init

[添加文件]
** 把文件提交到仓库，可反复多次使用，添加多个文件
git add <file>

[提交文件]
** 把已添加的文件全部提交到仓库
git commit -m "wrote a readme file"

[仓库状态]
git status

[查看修改]
git diff readme.txt
git diff HEAD -- readme.txt （查看工作区和版本库里面最新版本的区别）
git diff [options] [<commit>] [--] [<path>…]
git diff [options] --cached [<commit>] [--] [<path>…]
git diff [options] <commit> <commit> [--] [<path>…]
git diff [options] <blob> <blob>
git diff [options] [--no-index] [--] <path> <path>

[提交历史]
git log：显示一个分支中提交的更改记录
git log --oneline：一行一条记录
git log --graph：查看历史中什么时候出现了分支、合并

[HEAD]
** 当前分支的当前版本
HEAD：当前版本
HEAD^：上个版本
HEAD^^：上上个版本
HEAD~100：往上100个版本

[回溯版本]
git reset --hard HEAD^ （回溯到上个版本）
git reset --hard 3628164 （回溯到指定版本）

[命令历史]
git reflog

[撤销修改]
git checkout -- <file>

[删除文件]
git rm <file>

[创建密钥]
ssh-keygen -t rsa -C "youremail@example.com"
~/.ssh目录下
id_rsa：私钥
id_rsa.pub：公钥

[远程管理]
git remote：列出远端别名
git remote -v：列出远端别名，-v参数：每个别名的实际链接地址
git remote add [alias] [url]：为项目添加一个新的远端仓库
git remote rm [alias]：删除现存的某个别名

[更新仓库]
git fetch [alias]：从远端仓库下载新分支与数据

[推送更新]
git push [alias] [branch]：推送你的新分支与数据到某个远端仓库

[分支管理]
git branch：列出可用的分支
git branch (branch)：创建新分支
git checkout (branch)：切换分支
git checkout -b (branch)：创建新分支，并立即切换到它
git branch -d (branch)：删除分支
git merge：将指定分支合并到当前分支
