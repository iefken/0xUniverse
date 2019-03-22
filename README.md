# 0xUniverse

	0xUniverse is a blockchain-based game on Ethereum.
	https://0xuniverse.com

	Etherscan is a blockchain explorer for tracking all interactions with the Ethereum blockchain.
	https://etherscan.io
	(best to make an account here to create an own apiKey for using it for yourself)

	This repository is meant to showcase some PHP-coding snippets used to pull data for the 0xUniverse game 
	(or more general snippets in the future).
	
	The overall project is a work-in-progress but can already be used to some extent. 
	Please have a look here: https://ieffalot.me/0xuniverse/v1/0xhelper/ 
	
	Any feedback, optimalizations, additions, ... are gladly appreciated. Open a new issue here:
	https://github.com/iefken/0xUniverse/issues and I'll check what I can do.
	

## Dev log


------------------------------------------------------------------------------
#### 22.03.2019: v1.0: PlanetDataPuller
	
##### 1) ./PlanetData/ (https://ieffalot.me/0xuniverse/Github/PlanetData/PullPlanetData.php)

	./Planet.php:
		- contains the defining class for 'our' Planet object
		- parses the hexadecimal values gotten from Etherscan to decimal values

	./PullPlanetData.php:
		- contains initialization of the variables* needed to connect to Etherscan
		- contains the logic to handle the response (with a little help from the Planet.php file)
		- prints the 'json_encoded' values of the Planet.php class

	*: $startBlock, $toBlock, $contractAddress, $topic0, $apiKey, $url
------------------------------------------------------------------------------
