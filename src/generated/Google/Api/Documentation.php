<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/api/documentation.proto

namespace Google\Api;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * `Documentation` provides the information for describing a service.
 * Example:
 * <pre><code>documentation:
 *   summary: >
 *     The Google Calendar API gives access
 *     to most calendar features.
 *   pages:
 *   - name: Overview
 *     content: &#40;== include google/foo/overview.md ==&#41;
 *   - name: Tutorial
 *     content: &#40;== include google/foo/tutorial.md ==&#41;
 *     subpages;
 *     - name: Java
 *       content: &#40;== include google/foo/tutorial_java.md ==&#41;
 *   rules:
 *   - selector: google.calendar.Calendar.Get
 *     description: >
 *       ...
 *   - selector: google.calendar.Calendar.Put
 *     description: >
 *       ...
 * </code></pre>
 * Documentation is provided in markdown syntax. In addition to
 * standard markdown features, definition lists, tables and fenced
 * code blocks are supported. Section headers can be provided and are
 * interpreted relative to the section nesting of the context where
 * a documentation fragment is embedded.
 * Documentation from the IDL is merged with documentation defined
 * via the config at normalization time, where documentation provided
 * by config rules overrides IDL provided.
 * A number of constructs specific to the API platform are supported
 * in documentation text.
 * In order to reference a proto element, the following
 * notation can be used:
 * <pre><code>&#91;fully.qualified.proto.name]&#91;]</code></pre>
 * To override the display text used for the link, this can be used:
 * <pre><code>&#91;display text]&#91;fully.qualified.proto.name]</code></pre>
 * Text can be excluded from doc using the following notation:
 * <pre><code>&#40;-- internal comment --&#41;</code></pre>
 * Comments can be made conditional using a visibility label. The below
 * text will be only rendered if the `BETA` label is available:
 * <pre><code>&#40;--BETA: comment for BETA users --&#41;</code></pre>
 * A few directives are available in documentation. Note that
 * directives must appear on a single line to be properly
 * identified. The `include` directive includes a markdown file from
 * an external source:
 * <pre><code>&#40;== include path/to/file ==&#41;</code></pre>
 * The `resource_for` directive marks a message to be the resource of
 * a collection in REST view. If it is not specified, tools attempt
 * to infer the resource from the operations in a collection:
 * <pre><code>&#40;== resource_for v1.shelves.books ==&#41;</code></pre>
 * The directive `suppress_warning` does not directly affect documentation
 * and is documented together with service config validation.
 *
 * Protobuf type <code>Google\Api\Documentation</code>
 */
class Documentation extends \Google\Protobuf\Internal\Message
{
    /**
     * A short summary of what the service does. Can only be provided by
     * plain text.
     *
     * Generated from protobuf field <code>string summary = 1;</code>
     */
    private $summary = '';
    /**
     * The top level pages for the documentation set.
     *
     * Generated from protobuf field <code>repeated .google.api.Page pages = 5;</code>
     */
    private $pages;
    /**
     * A list of documentation rules that apply to individual API elements.
     * **NOTE:** All service configuration rules follow "last one wins" order.
     *
     * Generated from protobuf field <code>repeated .google.api.DocumentationRule rules = 3;</code>
     */
    private $rules;
    /**
     * The URL to the root of documentation.
     *
     * Generated from protobuf field <code>string documentation_root_url = 4;</code>
     */
    private $documentation_root_url = '';
    /**
     * Declares a single overview page. For example:
     * <pre><code>documentation:
     *   summary: ...
     *   overview: &#40;== include overview.md ==&#41;
     * </code></pre>
     * This is a shortcut for the following declaration (using pages style):
     * <pre><code>documentation:
     *   summary: ...
     *   pages:
     *   - name: Overview
     *     content: &#40;== include overview.md ==&#41;
     * </code></pre>
     * Note: you cannot specify both `overview` field and `pages` field.
     *
     * Generated from protobuf field <code>string overview = 2;</code>
     */
    private $overview = '';

    public function __construct() {
        \GPBMetadata\Google\Api\Documentation::initOnce();
        parent::__construct();
    }

    /**
     * A short summary of what the service does. Can only be provided by
     * plain text.
     *
     * Generated from protobuf field <code>string summary = 1;</code>
     * @return string
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * A short summary of what the service does. Can only be provided by
     * plain text.
     *
     * Generated from protobuf field <code>string summary = 1;</code>
     * @param string $var
     */
    public function setSummary($var)
    {
        GPBUtil::checkString($var, True);
        $this->summary = $var;
    }

    /**
     * The top level pages for the documentation set.
     *
     * Generated from protobuf field <code>repeated .google.api.Page pages = 5;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getPages()
    {
        return $this->pages;
    }

    /**
     * The top level pages for the documentation set.
     *
     * Generated from protobuf field <code>repeated .google.api.Page pages = 5;</code>
     * @param array|\Google\Protobuf\Internal\RepeatedField $var
     */
    public function setPages(&$var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Api\Page::class);
        $this->pages = $arr;
    }

    /**
     * A list of documentation rules that apply to individual API elements.
     * **NOTE:** All service configuration rules follow "last one wins" order.
     *
     * Generated from protobuf field <code>repeated .google.api.DocumentationRule rules = 3;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getRules()
    {
        return $this->rules;
    }

    /**
     * A list of documentation rules that apply to individual API elements.
     * **NOTE:** All service configuration rules follow "last one wins" order.
     *
     * Generated from protobuf field <code>repeated .google.api.DocumentationRule rules = 3;</code>
     * @param array|\Google\Protobuf\Internal\RepeatedField $var
     */
    public function setRules(&$var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Api\DocumentationRule::class);
        $this->rules = $arr;
    }

    /**
     * The URL to the root of documentation.
     *
     * Generated from protobuf field <code>string documentation_root_url = 4;</code>
     * @return string
     */
    public function getDocumentationRootUrl()
    {
        return $this->documentation_root_url;
    }

    /**
     * The URL to the root of documentation.
     *
     * Generated from protobuf field <code>string documentation_root_url = 4;</code>
     * @param string $var
     */
    public function setDocumentationRootUrl($var)
    {
        GPBUtil::checkString($var, True);
        $this->documentation_root_url = $var;
    }

    /**
     * Declares a single overview page. For example:
     * <pre><code>documentation:
     *   summary: ...
     *   overview: &#40;== include overview.md ==&#41;
     * </code></pre>
     * This is a shortcut for the following declaration (using pages style):
     * <pre><code>documentation:
     *   summary: ...
     *   pages:
     *   - name: Overview
     *     content: &#40;== include overview.md ==&#41;
     * </code></pre>
     * Note: you cannot specify both `overview` field and `pages` field.
     *
     * Generated from protobuf field <code>string overview = 2;</code>
     * @return string
     */
    public function getOverview()
    {
        return $this->overview;
    }

    /**
     * Declares a single overview page. For example:
     * <pre><code>documentation:
     *   summary: ...
     *   overview: &#40;== include overview.md ==&#41;
     * </code></pre>
     * This is a shortcut for the following declaration (using pages style):
     * <pre><code>documentation:
     *   summary: ...
     *   pages:
     *   - name: Overview
     *     content: &#40;== include overview.md ==&#41;
     * </code></pre>
     * Note: you cannot specify both `overview` field and `pages` field.
     *
     * Generated from protobuf field <code>string overview = 2;</code>
     * @param string $var
     */
    public function setOverview($var)
    {
        GPBUtil::checkString($var, True);
        $this->overview = $var;
    }

}

