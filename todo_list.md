# todo list AND idea's scrapbook
# QUANT SYMFFIREWALL
## Bundles

### Quant Utilities MongoRouterBundle
  


#### Required fixes
1. Fix that a route that you add via the new route menu with a checked active box actually becomes active  
- Fix that a activated route gets a deactivate button after being activated via Ajax button
	- Also the other way around. A deactivation needs to have the activation button!  
	   
	 ** Under investigation (23/10) **
	
- Don't know if fixable (activation should resort the tables, to instantly give the right idea about new order/priorities)


#### New features (to build, not announced)

- Write the caching feature
- **Write a select Namespace/Controller (and methods of given classes that are public and end on *Action) dropdown**
	- Would improve security too, less errors
	- More easy
- Arrow up and down buttons to change priority
	- Do it intelligent (a.k.a. change the priority if we need to prefer some route over the first priority)


#### To overthink:
1. Think of a comments/notes thing per route?
	* **! Don't select that while iterating over the routes to find a match**


- Regarding to the auto Controller/Action feature where would the available namespaces best be stored
	* And what about ACL (can every user use any action?)
	* Requires parameters, make it real fancy?
	
- Instead of adding to database, also generate YAML, PHP and XML definitions with the create form (as a smart tool to get rid of all the work that has to be done when writing routes by hand)?

---
  
## General firewall todo's and ideas

- Write something to add a second database (*mySQL*) and entity manager on the fly in Symfony

*Probably searchable with something like 'dynamic added databases in Symfony'*

### As for CRUD interfaces in general
- A undo button would be awesome 
	- Idea to make it:
		- Save the reversed query in mongo as a step
		- Doign this will make it possible to have a full history for going backwards
		
			- Con: Data amounts (**YET** there must be a solution to that.)
			- Data amount issue could be fixed by limiting, in time, or per user, or per ranking, or with *common sense*
				- Common sense? For example: deleting multiple routes should be kept longer then, say (de)activating some of them
				- Restore points
			- Also multi select and a 'with select dropdown'

---

### Building plan notations
- Communication with the second $em to the WP_db 
- Using cUrl to get the pages?
- Using Ajax to preload the pages before recaching them -> live preview
 

 
  
    
## Tomorows plans / logs / links / fixes
### 24 oct 2012

***

### 23 oct 2012
- Fix for bug no 2 is visually okay, yet functional it is not yet what it should be.
	- Strange: it looks like the reproduced buttons (after a change in state active/passive) are not working...
	
	- This issue has to do with the following:  
	~~~*Fatal error: Call to undefined function Quant\Utilities\MongoRouterBundle\Controller\Response() in /Applications/MAMP/htdocs/gingerware/src/Quant/Utilities/MongoRouterBundle/Controller/AdminController.php on line 103
Call Stack*~~~
		- Fixed (today, no tomorrow issue anymore)
		
	- Still an issue, yet I have found the solution, the source of the problem is that it is about new elements… (added after document.onload)
	
		- [**Rebinding after ajax handlings**](http://forum.jquery.com/topic/new-ajax-added-elements-dont-behave-invoke-body-load-functions)  
		This will solve it. 
		Tomorrow

As for the multiple db connections regard these:
   
- [**Forumpost**](http://forum.symfony-project.org/viewtopic.php?t=36408&p=121630)
- [**Stackoverflow**](http://stackoverflow.com/questions/6409167/symfony-2-multiple-and-dynamic-database-connection) 



 

- ACL!

~~~- Router path manipulator finish -> match?  
	- A dispatch might be too much.~~~
		- Haha, it already does find the match (needs checking for ambiguity but still!)




