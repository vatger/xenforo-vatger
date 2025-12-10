# Xenforo-Vatger

The Xenforo-Vatger (previously Xenforo-Auth) addon modifies the behaviour of the [Xenforo](https://xenforo.com/) forum software. In its current state, it handles the following two cases:
1. Authenticating users via VATSIM Germany's OAuth2 provider. 
2. Using functional accounts by staff members.
3. Adding and removing staff-/moderation groups.
4. Assigning and removing avatars.

> [!NOTE]
> Although the Addon is tailored towards the VATSIM Germany OAuth2 implementation, VATSIM's implementation can (with minor modifications) be used as well. 

## Contact

|         Name         | Responsible for |     Contact     |
|:--------------------:|:---------------:|:---------------:|
| Nikolas G. - 1373921 |        *        | `git@vatger.de` |
|  Paul H. - 1450775   |        *        | `git@vatger.de` |

## Prerequisites

- PHP 7.0 or higher with the following extensions enabled:
  - MySQLi, GD (with JPG support), PCRE, cURL, SPL, SimpleXML, DOM, JSON, iconv, ctype
- MySQL 5.5 or higher
- (local) Instance of Xenforo. The respective documentation on where to obtain the source code can be found here: https://xenforo.com/docs/dev/.

For local development:
- Nginx / Apache webserver

See https://xenforo.com/purchase/self-hosted for more details on requirements

## Installing and Running
### Installing

You have two options to install this Addon. 

1. Within your Xenforo CP navigate to `Add-ons > Add-ons`. 
Select the `Install/upgrade from archive` button located in the top right corner and select the archive you wish to use. 
Archives of the Addon can be found in the release section of the GitHub repository (https://github.com/vatger/xenforo-auth/releases). 

2. Since these archives may not always be fully up-to-date, you may wish to install the Addon manually. For this, you can follow the short guide below. 

### Installing Manually

Extract the contents of this repository into `/src/addons`, which should leave you with the following structure: `/src/addons/VATGER/OAuth/...`.

You can now use Xenforo's CLI to install the addon using 
```bash
$ php cmd.php xf:addon-install VATGER/Auth
``` 

> [!CAUTION]
> Make sure to create a backup of the database beforehand as the installation will alter the `xf_user` table.

### Configuration
Within the Xenforo CP, navigate to `Setup > Options > VATGER - Authentication`. Here you'll be greeted with the following (empty) page:

<img src="./docs/img/xenforo_settings.png" width="700px" alt="Xenforo settings page">


Once you've entered your data in these fields, OAuth should simply work! The "Log in" button on the homepage is overridden to navigate to `/oauth` which starts the flow and signs the user in. 

