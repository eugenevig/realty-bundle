
# Realty Bundle Scope Document

## 1. Project Overview

### 1.1. Purpose & Vision

The **Realty Bundle** is a Symfony-based, reusable component designed to power **public real estate portals**. Its main goal is to serve as a **modular and portable bundle** that can be integrated into multiple Symfony applications. It provides all the essential features for showcasing real estate listings to website visitors while also supporting admin management through the Sonata Project.

This bundle will offer:
- A **Sonata Admin UI** for managing real estate objects and supporting metadata.
- **Public-facing listing and detail views** using Twig templates.
- A **headless JSON API** for third-party consumption and headless frontend rendering.

### 1.2. Target Audience

- **End Users / Website Visitors**: Casual and professional users searching for real estate to buy or rent. They will access public listings via a filterable search and object detail pages.
- **Developers / Integrators**: Symfony developers who will reuse or adapt the bundle across different client projects.

### 1.3. Deployment & Use

- The bundle is designed to be **self-contained and portable**, making it possible to reuse it in various Symfony-based projects.
- Both **Twig-rendered frontend pages** and **API endpoints** are provided. This allows flexibility in how the real estate data is presented—either using server-side rendering or via decoupled frontends.
- No user accounts or session management is required for the frontend — the application will remain **read-only and publicly browsable**, except for local storage-based functionality.

### 1.4. Localization

All user-facing data (including property names, descriptions, and SEO metadata) will support **multilingual content**, leveraging Symfony’s translation mechanisms and structured localized fields in the database.

### 1.5. UI Interactions

The public site will implement **AJAX-based filtering and search**, ensuring a dynamic and responsive experience for browsing real estate listings.

---

## 2. Scope Confirmation

### ✔ Included Features

| Area                | Features                                                                 |
|---------------------|--------------------------------------------------------------------------|
| **Admin (Sonata)**  | CRUD for real estate objects, buildings, projects, attributes, galleries |
| **Public Website**  | AJAX-powered listings and detail pages                                   |
|                     | Add objects to favourites using browser storage (JavaScript-based)       |
|                     | Download PDF with object info including floor plan                       |
|                     | Generate PDF from dedicated HTML endpoint with custom layout             |
| **Public API**      | JSON API using custom Symfony controllers with full filtering support    |
| **Localization**    | Multilingual support for all text-based fields                           |
| **Portability**     | Designed as a standalone, reusable Symfony bundle                        |

### ❌ Not in Scope

- No backend user authentication or profile features
- No backend-managed favorites (handled on client side only via JavaScript and browser storage)
- No external integrations (e.g., payment systems, maps) unless otherwise specified
