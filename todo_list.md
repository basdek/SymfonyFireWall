# todo list 
## Quant Utilities MongoRouterBundle
  

### Required fixes
- Fix that a route that you add via the new route menu with a checked active box actually becomes active  
- Fix that a activated route gets a deactivate button after being activated via Ajax button
	- Also the other way around. A deactivation needs to have the activation button!
	
- Don't know if fixable (activation should resort the tables, to instantly give the right idea about )


### New features

- Write the caching feature
- **Write a select Namespace/Controller (and methods of given classes that are public and end on *Action) dropdown**
	- Would improve security too, less errors
	- More easy


### To overthink:
1. Think of a comments/notes thing per route?
	* **! Don't select that while iterating over the routes to find a match**
2. A undo button would be awesome 
3. Also multi select and a 'with select dropdown'

4. Regarding to the auto Controller/Action feature where would the available namespaces best be stored
	* And what about ACL (can every user use any action?)


---
  
## General firewall todo's and ideas

- Write something to add a second database (*mySQL*) and entity manager on the fly in Symfony

*Probably searchable with something like 'dynamic added databases in Symfony'*

### Excelent ideas on how to build some of the required components

- Communication with the second $em to the WP_db 
- Using cUrl to get the pages?
- Using Ajax to preload the pages before recaching them -> live preview
 





#### By Quant
