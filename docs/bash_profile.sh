#!/bin/bash

# creating aliases"
alias l='ls -l'
alias ll='ls -AlF'

alias rm='rm -i'
alias cp='cp -i'
alias mv='mv -i'

# configuring editor"
export EDITOR=nano

# configuring terminal prompt"
export CLICOLOR=1
export LSCOLORS=ExFxCxDxBxegedabagacad
PS1='\[\033[1;30m\]\n[\[\033[0;36m\]\@\[\033[1;30m\]]-[\[\033[0;32m\]\u\[\033[0;33m\]@\[\033[0;32m\]\h\[\033[1;30m\]]-[\[\033[0;35m\]\w\[\033[1;30m\]]-[\[\033[0;33m\]$(parse_git_branch)\[\033[1;30m\]]\[\033[1;30m\]-[\[\033[0;31m\]ENEFF\[\033[1;30m\]]\n\[\033[00m\]\$ '

# configuring git completion"
if [ -f /usr/local/etc/bash_completion ]; then
. /usr/local/etc/bash_completion
fi

# configuring git terminal prompt"
function parse_git_branch () {
git branch 2> /dev/null | sed -e '/^[^*]/d' -e 's/* \(.*\)/\1/'
}
