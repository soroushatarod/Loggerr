Loggerr
=======
A simple Log Util, that colors the log written to file. If viewed on terminal the logs wil be colored.

You need to a folder named as log in the root directory of the site.

To write an error log

<pre>

   Log::getInstance()->logError('file not found');

</pre>


To write an Info log

<pre>

   Log::getInstance()->logInfo('Message not send');

</pre>

