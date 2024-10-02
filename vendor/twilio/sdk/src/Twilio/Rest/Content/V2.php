<?php
/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Content
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Twilio\Rest\Content;

use Twilio\Domain;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Rest\Content\V2\ContentList;
use Twilio\Rest\Content\V2\ContentAndApprovalsList;
use Twilio\Version;

/**
 * @property ContentList $contents
 * @property ContentAndApprovalsList $contentAndApprovals
 */
class V2 extends Version
{
    protected $_contents;
    protected $_contentAndApprovals;

    /**
     * Construct the V2 version of Content
     *
     * @param Domain $domain Domain that contains the version
     */
    public function __construct(Domain $domain)
    {
        parent::__construct($domain);
        $this->version = 'v2';
    }

    protected function getContents(): ContentList
    {
        if (!$this->_contents) {
            $this->_contents = new ContentList($this);
        }
        return $this->_contents;
    }

    protected function getContentAndApprovals(): ContentAndApprovalsList
    {
        if (!$this->_contentAndApprovals) {
            $this->_contentAndApprovals = new ContentAndApprovalsList($this);
        }
        return $this->_contentAndApprovals;
    }

    /**
     * Magic getter to lazy load root resources
     *
     * @param string $name Resource to return
     * @return \Twilio\ListResource The requested resource
     * @throws TwilioException For unknown resource
     */
    public function __get(string $name)
    {
        $method = 'get' . \ucfirst($name);
        if (\method_exists($this, $method)) {
            return $this->$method();
        }

        throw new TwilioException('Unknown resource ' . $name);
    }

    /**
     * Magic caller to get resource contexts
     *
     * @param string $name Resource to return
     * @param array $arguments Context parameters
     * @return InstanceContext The requested resource context
     * @throws TwilioException For unknown resource
     */
    public function __call(string $name, array $arguments): InstanceContext
    {
        $property = $this->$name;
        if (\method_exists($property, 'getContext')) {
            return \call_user_func_array(array($property, 'getContext'), $arguments);
        }

        throw new TwilioException('Resource does not have a context');
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string
    {
        return '[Twilio.Content.V2]';
    }
}
