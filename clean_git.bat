@echo off
git rm -r --cached .
git add .
git commit -m "Cleaned up gitignore and removed large binaries"
git status
