# Dockerfile for the ICS 199
# Local DB Server
#
# use mysql version 5.7.12 to match Dokku version
FROM mysql:5.7.12
LABEL maintainer="Jason Cumiskey <cumiskey@camosun.bc.ca>"

ARG dbname
ARG password

# Populate the db_credentials.php file with the credentials in .env
RUN populate-db-credentials.sh "$dbname" "$password"