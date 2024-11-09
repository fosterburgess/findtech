# techfind

allow public users to search through 
technology records by text, or by tag search.

allow admin user to create/manage 
technology records.  

## technology

* title
* case number
* abstract (html)
* applications
* advantages
* publications
* related links
* keywords

Future need for API to bulk post in updates or 
new technology records.

## Nov 9, 2024
Going to scale this back to start with 
for an initial prototype.

Focus on basic mysql-based search with scout.

Possibly attempt some faceting on tags, 
but likely not.

Simple front end UI.

Configurable front-end logo, contact 
info and header/footer text (planning on 'settings' 
panel in admin for this.)

Will be removing some items 
from docker-compose.yml that aren't needed for 
this prototype.

