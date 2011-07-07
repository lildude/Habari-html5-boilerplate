#!/usr/bin/env bash

#Generate a new project from your HTML5 Boilerplate repo clone
#by: Rick Waldron & Michael Cetrulo


## first run
# $ cd html5-boilerplate/build
# $ chmod +x createproject.sh && ./createproject.sh

## usage
# $ cd html5-boilerplate/build
# $ ./createproject.sh
#
# OR
# $ cd html5-boilerplate/build
# $ ./createproject.sh newThemeName

# find project root
cur=$(basename $(pwd))

if [[ $cur == 'build' ]]; then
	src=$(dirname $(pwd))
else
	echo "fatal: Please run createproject.sh from within the 'build' directory" >&2
	exit 1
fi

[[ -d $src ]] || {
  echo "fatal: could not determine html5-boilerplate's root directory." >&2
  echo "Please ensure you run createproject.sh from within the 'build' directory" >&2
  exit 1
}

# get a name for new project

# Accept a cli option
name=$1

# Or prompt for a name if one not given
while [[ -z $name ]]
do
    echo "To create a new html5-boilerplate theme, enter a new theme name:"
    read name || exit
done

dst=$src/../$name

if [[ -d $dst ]]
then
    echo "$dst exists"
else
    #create new project
    mkdir -- "$dst" || exit 1

    #sucess message
    echo "Created Directory: $dst"

    cd -- "$src"
    cp -vr -- css js img build test *.html *.xml *.txt *.png *.ico .htaccess *.php "$dst"

	# Change theme name to match theme name just entered
	sed -i -e "s#<name>Html5BoilerPlate</name>#<name>${name}</name>#" $dst/theme.xml
	sed -i -e "s#<class>html5BoilerplateTheme</class>#<class>${name}Theme</class>#" $dst/theme.xml
	sed -i -e "s#^class .* extends Theme#class ${name}Theme extends Theme#" $dst/theme.php

    #sucess message
    echo "Created Theme: $dst"
fi

