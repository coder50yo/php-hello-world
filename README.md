# PHP Hello World App

This guide will walk you through the process of setting up a simple PHP "Hello World" application. We'll start by installing Homebrew, setting up PHP, and then creating a basic app with a unit test. We'll also set up a proper file structure, `.gitignore`, and include everything in this README.

## Prerequisites

- A macOS or Linux environment.
- Basic knowledge of terminal commands.
- Git installed on your machine.

## Step 1: Install Homebrew

Homebrew is a package manager for macOS and Linux. First, you need to install Homebrew if you don't already have it.

```bash
/bin/bash -c "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/HEAD/install.sh)"
```

After installation, add Homebrew to your PATH:

```bash
echo 'eval "$(/opt/homebrew/bin/brew shellenv)"' >> ~/.zprofile
eval "$(/opt/homebrew/bin/brew shellenv)"
```

Verify the installation:

```bash
brew --version
```

## Step 2: Install PHP using Homebrew

Now that Homebrew is installed, you can install PHP.

```bash
brew install php
```

Verify the installation:

```bash
php -v
```

This should display the version of PHP installed.

## Step 3: Create the PHP Hello World App

Now, let's create a simple PHP script that prints "Hello, World!".

1. **Create a project directory**:

    ```bash
    mkdir hello-world-php
    cd hello-world-php
    ```

2. **Create the `index.php` file**:

    ```bash
    touch index.php
    ```

3. **Edit `index.php`**:

    Open the file in your preferred text editor and add the following code:

    ```php
    <?php
    echo "Hello, World!";
    ```
   
   This simple script will print "Hello, World!" when executed.

## Step 4: Set Up the File Structure

A typical project structure for a simple PHP app might look like this:

```
hello-world-php/
├── src/
│   └── index.php
├── tests/
│   └── IndexTest.php
├── .gitignore
└── README.md
```

Create the necessary directories and move `index.php` into the `src/` directory:

```bash
mkdir src tests
mv index.php src/
```

## Step 5: Create a `.gitignore` File

The `.gitignore` file tells Git which files (or patterns) it should ignore. Create the `.gitignore` file:

```bash
touch .gitignore
```

Edit the `.gitignore` file with the following content:

```
# Ignore Composer dependencies
/vendor/

# Ignore macOS system files
.DS_Store

# Ignore PHPUnit cache and logs
.phpunit.result.cache
coverage/
```

## Step 6: Write Unit Tests

We will use PHPUnit to write a unit test for our Hello World app. First, install PHPUnit using Composer:

```bash
brew install composer
composer require --dev phpunit/phpunit ^10
```

Create a test file `IndexTest.php` in the `tests/` directory:

```bash
touch tests/IndexTest.php
```

Add the following content to `IndexTest.php`:

```php
<?php

use PHPUnit\Framework\TestCase;

class IndexTest extends TestCase
{
    public function testHelloWorld()
    {
        ob_start();
        include 'src/index.php';
        $output = ob_get_clean();
        $this->assertEquals('Hello, World!', $output);
    }
}
```

This test checks if the output of `index.php` is exactly "Hello, World!".

To run the tests, use:

```bash
./vendor/bin/phpunit --bootstrap vendor/autoload.php tests/IndexTest.php
```

## License

This project is licensed under the MIT License.