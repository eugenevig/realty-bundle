
# Realty Bundle Functional Requirements

## 1. Introduction

This document defines the functional requirements for the Realty Bundle, a reusable Symfony 6 module for managing and displaying real estate objects for public-facing websites and admin users. It includes administrative and public-facing features with a full list of editable fields per entity and brief descriptions of their roles.

---

## 2. User Roles

### Admin (via Sonata Admin)
- Full CRUD access to real estate data and related metadata.
- Manages galleries, floor plans, documents, and translations.

### Visitor (Website)
- Browses listings, filters/searches objects.
- Views object details and downloads PDF brochures.
- Stores data on selected (favorited) objects in browser local storage using JavaScript.

---

## 3. Functional Modules

### 3.1 Admin Modules (Sonata)

#### Real Estate Objects
**Description:** Central entity representing individual real estate units (apartments, houses, etc.) with associated pricing, attributes, media, and linked metadata.
**Editable Fields:**
- Object Type, Building, Status, Listing Type, Renovation Type
- External ID, Internal ID, Name (translatable), Description (translatable)
- Object ID (apartment/house number), Floor, Orientation (multi), Area total, Ceiling height
- Price, Price per square meter, Discount, Discount valid until, Currency
- Floor plan (upload), Gallery (multi-image, sortable)
- Composition (rooms with name, area, gallery)
- Documents (uploadable), Created at / Updated at (auto-managed)

#### Projects
**Description:** Represents a development project consisting of one or more buildings.
**Editable Fields:**
- Internal ID, External ID, Project name (translatable), Description (translatable)
- Gallery (multi-image), SEO Meta title/description (translatable), Slug (per locale)

#### Buildings
**Description:** Represents a physical structure within a project that houses real estate objects.
**Editable Fields:**
- Internal ID, External ID, Section, Building number/name, Coordinates (latitude, longitude)
- Country, Region, City, District, Street, Year built, Planned delivery date
- Building type (brick, panel, monolith, wooden, etc.), Gallery (multi-image)
- Link to Project

#### Object Types
**Description:** Defines the category of a real estate object (e.g., apartment, house, parking).
**Editable Fields:**
- Internal ID, Name (translatable)

#### Statuses
**Description:** Tracks availability of a real estate object (e.g., available, sold, reserved).
**Editable Fields:**
- Internal ID, Name (translatable)

#### Listing Types
**Description:** Indicates the transactional context (e.g., sale, rent, lease, auction).
**Editable Fields:**
- Internal ID, Name (translatable)

#### Renovation Types
**Description:** Describes the renovation status of the property.
**Editable Fields:**
- Internal ID, Name (translatable)

#### Custom Attributes
**Description:** Defines custom property features like "balcony" or "fireplace" to enhance filtering.
**Editable Fields:**
- Internal ID, Name (translatable), Input type, Project link (optional), Sort order, Filterable (boolean)

#### Attribute Values
**Description:** Stores actual values of custom attributes for a specific object.
**Editable Fields:**
- Attribute, Value, Linked Real Estate Object

#### Room Definitions
**Description:** Standardized definitions for rooms used across multiple objects (e.g., kitchen, bedroom).
**Editable Fields:**
- Internal ID, Name (translatable), Attribute set (area, gallery support), Sort order

#### Rooms
**Description:** Defines the layout of a real estate object by composing it of rooms.
**Editable Fields:**
- Room definition, Name (optional), Area, Gallery (multi-image)

#### Documents
**Description:** Files related to an object such as brochures or legal papers.
**Editable Fields:**
- Title (translatable), File (PDF or other format)

#### Media Gallery Items
**Description:** Image assets linked to projects, buildings, or real estate objects.
**Editable Fields:**
- Image file, Sort order, Alt text (optional)

---

### 3.2 Public Website

#### Listing Page
- Filterable by: type, area, price, building, status, floor, discount, additional attributes
- AJAX search, pagination/infinite scroll, sorting (price, area)

#### Detail Page
- Displays full information about object
- Includes related building/project, gallery, documents

#### Favorites
- Uses browser local storage via JavaScript
- Add/remove with toggle UI
- Optional list view of saved favorites

#### PDF Download
- Separate endpoint for HTML print layout
- Used by 3rd-party PDF generator service

---

### 3.3 JSON API

#### Endpoints:
- `GET /api/objects`: List with filters, pagination
- `GET /api/objects/{id}`: Full object details

#### Filtering Parameters:
- Type, Area, Price, Building, Status, Floor, Discount, Attributes

---

## 4. Validation Rules

- Required: name, type, building, price
- Ranges: area, price, discount
- Format checks for file uploads

---

## 5. Localization

- Translatable fields:
  - Name, Description for Projects, Buildings, RealEstateObjects
  - SEO Meta Title and Description
- Slug per locale

---

## 6. SEO Requirements

- Meta fields and slugs per locale
- SEO tab in admin forms

---

## 7. Non-Functional Requirements

- AJAX filters and dynamic UI for public pages
- Lazy loading for media galleries
- Responsive frontend layout
- HTML rendering for PDF should load cleanly and independently
