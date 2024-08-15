# Jerry Lead Capturing Plugin

Jerry is a simple yet powerful WordPress plugin designed to display a lead-capturing modal on your website, perfect for gathering newsletter subscribers or any other lead generation purpose.

The plugin is named in honor of Jerry Herman, the acclaimed writer and composer known for his iconic work, including the song "Hello, Dolly!"—a tune familiar to many in the WordPress development community.

[Learn more about Jerry Herman](https://en.wikipedia.org/wiki/Jerry_Herman)

## Features

- **Customizable Modal Content**: Tailor the modal's heading, description, button text, and link text to match your site's branding.
- **Design Flexibility**: Adjust colors for the button and links directly from the WordPress admin panel.
- **Media Integration**: Choose an image for the modal from the WordPress media gallery.
- **Subscriber Management**: View, manage, and export your subscribers directly from the WordPress admin.
- **CSV Export**: Download the list of subscribers as a CSV file for easy integration with your marketing tools.
- **Google Tag Manager Integration**: Automatically push a `generate_lead` event to the data layer each time a new lead is captured.
- **Session-Based Modal Display**: Ensure the modal only appears once per session, improving user experience.

## Installation

1. **Upload Plugin**: Upload the plugin files to the `/wp-content/plugins/jerry-lead-capturing-plugin` directory, or install the plugin through the WordPress plugins screen directly.
2. **Activate Plugin**: Activate the plugin through the 'Plugins' screen in WordPress.
3. **Configure Settings**: Navigate to **Lead Capture > Setup Plugin** in the WordPress admin to configure the modal content, design, and behavior.


## Usage

1. **Add Modal via Shortcode**: Place the `[newsletter_modal]` shortcode anywhere on your site where you want the modal to be available.
2. **Customize Modal Content**: Use the admin settings to customize the text, colors, and images.
3. **Manage Subscribers**: View your subscribers under **Lead Capture > Subscribers List** and export them as CSV if needed.


## Configuration

### General Settings

- **Modal Heading**: The main heading (H2) text displayed in the modal.
- **Modal Description**: A short description (P) that supports your lead-capturing message.
- **Input Placeholder**: Placeholder text for the email input field.
- **Button Text**: The text displayed on the submission button.
- **Right Link Text & URL**: Customize the right link's text and URL (e.g., "Sign in").
- **Left Link Text & URL**: Customize the left link's text and URL (e.g., "Continue reading").
- **Modal Image**: Choose an image from the media gallery to be displayed at the top of the modal.
- **Thank You Message**: The message displayed after successful form submission.

### Design Settings

- **Button Color**: Set the color of the submission button.
- **Link Color**: Set the color of the modal links.

### Export Settings

- **Download Subscribers as CSV**: Export your subscribers list as a CSV file from the **Subscribers List** page.

## Development

### Enqueueing Assets

The plugin carefully enqueues both admin and front-end assets:

- **Admin Assets**: Loaded only on the plugin's settings pages, ensuring the rest of your admin dashboard remains unaffected.
- **Front-End Assets**: Loaded only where the modal shortcode is used, keeping your site's performance optimized.

### Google Tag Manager Integration

Each time a new subscriber is captured, the plugin triggers a `generate_lead` event in the data layer with the `lead_source` parameter set to `"jerry modal"`. This allows seamless integration with Google Tag Manager or other analytics tools.

## Multilingual Support

Jerry Lead Capturing Plugin is fully translatable and supports multiple languages. We welcome contributions from the community to add translations in different languages.

### How to Contribute Translations

1. **Generate or download the `.pot` file** from the `languages` directory.
2. **Use a translation tool** like Poedit or Loco Translate to create a `.po` and `.mo` file for your language.
3. **Save the files** in the `languages` directory using the correct language and locale codes (e.g., `jerry-lead-capture-fr_FR.po` for French).
4. **Submit your translation** via a pull request on GitHub or by contacting the plugin author.


## Changelog

### Version 1.3

- **New**: Session-based modal display to ensure the modal shows only once per session.
- **New**: CSV export functionality for subscribers.
- **Improved**: Admin settings now allow for greater customization of modal content and design.
- **Improved**: Google Tag Manager integration for lead tracking.

### Version 1.2

- **New**: Added media gallery integration for selecting modal images.
- **New**: Color customization options for buttons and links.

### Version 1.1

- **New**: Introduced Google Tag Manager event trigger on lead capture.
- **Improved**: Enhanced modal styling and layout options.

### Version 1.0

- **Initial Release**: Basic modal for lead capturing with customizable text and links.

## Contributing

We welcome contributions from the community. Please feel free to submit pull requests or report issues on our GitHub repository.

## License

This plugin is licensed under the GPL-2.0+ license. You can find the full license text in the LICENSE file included with this plugin.

