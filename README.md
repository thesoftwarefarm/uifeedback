# Display messages library
 
Makes it easy to give a visual feedback to user

# Installation

Require this package in your `composer.json`. Run the following command:
```bash
composer require tsfcorp/uifeedback
```

After updating composer, the service provider will automatically be registered and enabled, along with the facade, using Auto-Discovery

Next step is to run the artisan command to bring the config into your project

```bash
php artisan vendor:publish --provider="TsfCorp\UiFeedback\UiFeedbackServiceProvider" --tag=config
```

Update `config/uifeedback.php`

# Usage Instructions

This library is build to work by default with Bootstrap 4.

You can add new messages wherever you'd like in you application, like this:
```php
UiFeedback::set(MessageFormat::SUCCESS, 'message');
```

`set` method has 3 parameters:
* message format: a string represeinting the class that will be added to the HTML container
* message: a string represeinting the class that will be added to the HTML container
* close button (optional, default: true): whether to display or not the close button for the alert

Message format has the following options, but you can specify there whatever class you'd like and customise the CSS in your app.
 
Message Format | Value
--- | ---
PRIMARY | primary
SECONDARY | secondary
SUCCESS | success
DANGER | danger
WARNING | warning
INFO | info
LIGHT | light
DARK | dark

### Display messages

In order to display the messages, you can add the following line in your views:
```php
{!! \TsfCorp\UiFeedback\Facades\UiFeedback::get() !!}
``` 

### Output messages

If you'd like to display a formatted message right away, you can use the following in your views:
```php
{!! \TsfCorp\UiFeedback\Facades\UiFeedback::format(\TsfCorp\UiFeedback\MessageFormat::SUCCESS, 'message'); !!}
 ```
 
### Group messages

If you set multiple messages of the same type (for example SUCCESS), a new alert will be generated for each message.
You can change this behaviour by setting the `group_errors` to `true`. This way messages of the same type will be displayed in the same alert box.

### Session errors

UiFeedback can capture validation errors and display these along with other messages you set. This is the default behaviour.
It can be changed in the config: `capture_validation_errors`

### Change output format

In order to change the format for a message you need to publish the view used:
```bash
php artisan vendor:publish --provider="TsfCorp\UiFeedback\UiFeedbackServiceProvider" --tag=views
```
Then you can edit the published view in: `resources/views/vendor`