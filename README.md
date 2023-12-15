<img src="https://www.seven.io/wp-content/uploads/Logo.svg" width="250" />


# Official [seven](https://www.seven.io) extension for [Mantis Bug Tracker](https://www.mantisbt.org/)

Send SMS from within issues via [seven](https://www.seven.io).

## Prerequisites

- [seven](https://www.seven.io) [API Key](https://help.seven.io/en/api-key-access) - can be created
  in
  your [developer dashboard](https://app.seven.io/developer)
- [Mantis Bug Tracker](https://www.mantisbt.org/)
- A [custom field](https://support.mantishub.com/hc/en-us/articles/204274065-Adding-custom-fields)
  holding the cell phone number

## Installation

1. Download
   the [latest release](https://github.com/seven-io/mantisbt/releases/latest/download/seven-mantisbt-latest.zip)
2. Extract the archive to `/path/to/mantisbt/plugins/`
3. Head to `Manage->Mange Plugins`
4. Locate `Seven` and click on `Install`
5. Click on `Seven`, fill out the form and submit it

## Usage

### Send SMS

Go to an issue and click on `Send SMS`.
If option `Project Phone Number Priority` is checked and the project description is a numeric value,
its value gets used.
If not, the plugin assumes that the `Custom Field with Phone Number` option has been set.
You can always set the recipient(s) manually in the SMS form.

## Support

Need help? Feel free to [contact us](https://www.seven.io/en/company/contact).

[![MIT](https://img.shields.io/badge/License-MIT-teal.svg)](LICENSE)
