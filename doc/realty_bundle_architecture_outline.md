
# Realty Bundle Architecture Outline

This document defines the architectural structure for the Realty Bundle, covering entities, services, controllers, and utility classes involved in delivering both the admin and public-facing functionality.

---

## 1. Overview

The Realty Bundle is a modular, Symfony 6-based component that provides:
- Admin interface using Sonata for managing real estate data
- Public web interface using Twig and AJAX for object listings and detail views
- JSON API with filtering and token-based access
- PDF export endpoint rendered via an HTML template

It is built for portability, localization, and modular reuse.

---

## 2. Modules and Responsibilities

### 2.1 Entity Layer
- Doctrine ORM-based entity classes
- Defined with relationships and translatable fields where applicable

### 2.2 Repository Layer
- Doctrine repositories for basic data access
- Custom query logic is offloaded to service layer (e.g., filtering)

### 2.3 Service Layer
- Contains reusable logic such as:
  - `ObjectFilterService`: Encapsulates filtering behavior for listings/API
  - `PdfHtmlViewBuilderService`: Prepares data and formatting context for HTML view
  - `FavoriteService`: (JS helper for frontend implementation spec)
  - `AttributeProcessorService`: Processes custom attributes and values

### 2.4 Controller Layer

#### Admin (via Sonata Admin)
- Uses SonataAdmin classes per entity
- Optionally extended to support advanced features like slug generation or localized previews

#### Public (Twig)
- `ObjectPublicController`
  - `/objects` – listing
  - `/objects/{slug}` – detail view

- `PdfRenderController`
  - `/objects/{id}/pdf-template` – returns a clean HTML version for third-party PDF rendering tools

#### API (JSON)
- `ObjectApiController`
  - `/api/objects` – filtered list
  - `/api/objects/{id}` – detail
  - Token-authenticated via Symfony security layer (e.g., JWT, API token)

---

## 3. Twig Views

- `list.html.twig`: Main listings template with filter blocks and AJAX behavior
- `detail.html.twig`: Individual object display
- `pdf_template.html.twig`: Print-optimized, clean HTML for PDF rendering

---

## 4. API

- Custom Symfony controllers return structured JSON
- Filtering handled via `ObjectFilterService`
- Secured with token-based access using a configurable firewall

---

## 5. Form Types

- Custom `FormType` classes per entity (e.g., RealEstateObjectType)
- Integrated with SonataAdmin for additional validation, translation support, and UX customization

---

## 6. Utilities

- `SlugGenerator` – Slugify and ensure uniqueness
- `GalleryHelper` – For ordered gallery display logic
- `TranslationHelper` – For fallback locale and field parsing
- `SeoHelper` – Title/description render and override support

---

## 7. Non-Functional Considerations

- No caching is implemented initially
- Real-time rendering of all listings and API content
- PDF generation is external; HTML endpoint is optimized for it
- Bundle is portable across Symfony apps and uses DI/autowiring for config
