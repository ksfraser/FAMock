# Packagist Webhook Setup

This document provides instructions for setting up automatic Packagist updates when commits are pushed to this repository.

## Option 1: GitHub Actions (Automated - Recommended)

This repository includes a GitHub Actions workflow (`.github/workflows/packagist.yml`) that automatically notifies Packagist on every push to the main branch.

### Setup Steps:

1. **Get your Packagist API Token:**
   - Log into [Packagist.org](https://packagist.org)
   - Go to your profile page
   - Click "Show API Token" to reveal your token

2. **Add GitHub Secrets:**
   - Go to your repository on GitHub
   - Navigate to: Settings → Secrets and variables → Actions
   - Click "New repository secret" and add:
     - Name: `PACKAGIST_USERNAME`
     - Value: Your Packagist username
   - Click "New repository secret" again and add:
     - Name: `PACKAGIST_TOKEN`
     - Value: Your Packagist API token

3. **Verify:**
   - Push a commit to the main branch
   - Go to the "Actions" tab in your GitHub repository
   - Check that the "Update Packagist" workflow ran successfully

## Option 2: Manual Webhook (Traditional Method)

Alternatively, you can set up a webhook directly in GitHub settings.

### Setup Steps:

1. **Get your Packagist API Token** (same as above)

2. **Add the Webhook in GitHub:**
   - Go to your repository on GitHub
   - Navigate to: Settings → Webhooks
   - Click "Add webhook"

3. **Configure the Webhook:**
   - **Payload URL:** 
     ```
     https://packagist.org/api/update-package?username=YOUR_PACKAGIST_USERNAME&apiToken=YOUR_API_TOKEN
     ```
     (Replace `YOUR_PACKAGIST_USERNAME` and `YOUR_API_TOKEN` with your actual credentials)
   - **Content type:** `application/json`
   - **Secret:** Leave blank (authentication is via the API token in the URL)
   - **Which events:** Select "Just the push event"
   - **Active:** Yes (checked)

4. **Save:**
   - Click "Add webhook"

5. **Verify:**
   - Push a commit to the repository
   - Go back to Settings → Webhooks
   - Click on the webhook and check "Recent Deliveries" to see if it was triggered successfully

## Notes

- **Security:** Keep your API token private. Never commit it directly to the repository.
- **Option 1 vs Option 2:** 
  - GitHub Actions (Option 1) is recommended as it's version-controlled and easier to manage
  - Manual Webhook (Option 2) works without requiring repository secrets but exposes your token in the URL
- The webhook/action only triggers on pushes to the repository, ensuring Packagist is always up-to-date
- For releases, both methods work, but the GitHub Actions workflow explicitly handles the `release` event

## Troubleshooting

- **Webhook not firing:** Check the "Recent Deliveries" in the webhook settings for error messages
- **GitHub Action failing:** Check the Actions tab for detailed error logs
- **Invalid credentials:** Verify your Packagist username and token are correct
- **Package not found:** Ensure your package is already registered on Packagist at https://packagist.org/packages/ksfraser/famock

## References

- [Packagist Documentation](https://packagist.org/)
- [GitHub Webhooks Documentation](https://docs.github.com/en/webhooks)
- [GitHub Actions Documentation](https://docs.github.com/en/actions)
