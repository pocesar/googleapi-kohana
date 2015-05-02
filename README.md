Google API for Kohana 3.3
================

Google API client wrapper, focused on the OAuth of Google+ (+ User info) for Kohana 3.3, but works for all the other services Google has to offer

### Usage

1. Create the folder in `APPPATH/cache` the folder `Google_Client` and set it writeable
2. Copy the file `modules/googleapi/config/googleapi.php` to `APPPATH/config/googleapi.php`, and configure your app ID, secrets, developer key, etc. Don't make modifications inside the file under `modules` folder
3. Add this module to your bootstrap
4. On your code, check if your user has already permitted the app, using `GPlus::instance()->getUser()`.
5. If not, send the user to `GPlus::instance()->client->createAuthUrl()`, preferably in a popup window
6. The `getUser()` method returns a `Google_Person` class, that has a lot of info about the user, BUT his email. To get his email, you need to use `getUserinfo()->email`

More info about the library and it's capabilities check [Google API PHP Client documentation](https://developers.google.com/api-client-library/php)

### Checkout as well

Check the other libraries with similar "sign in with" for [Facebook](https://github.com/pocesar/facebook-kohana) and [Twitter](https://github.com/pocesar/twitter-kohana)