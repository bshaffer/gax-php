<?php
/*
 * Copyright 2016, Google Inc.
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are
 * met:
 *
 *     * Redistributions of source code must retain the above copyright
 * notice, this list of conditions and the following disclaimer.
 *     * Redistributions in binary form must reproduce the above
 * copyright notice, this list of conditions and the following disclaimer
 * in the documentation and/or other materials provided with the
 * distribution.
 *     * Neither the name of Google Inc. nor the names of its
 * contributors may be used to endorse or promote products derived from
 * this software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 */

namespace Google\GAX\UnitTests\Mocks;

use Google\GAX\ApiException;
use Google\GAX\CallSettings;
use Google\GAX\CallStackTrait;
use Google\GAX\ApiTransportInterface;

class MockTransport implements ApiTransportInterface
{
    use CallStackTrait;

    private $stub;

    public function __construct($stub = null)
    {
        $this->stub = $stub;
    }

    /**
     * Creates a transport instance from a stub
     */
    public static function create($stub)
    {
        return new self($stub);
    }

    /**
     * Creates an API request
     * @return callable
     */
    public function createApiCall($method, CallSettings $settings, $options = [])
    {
        $handler = [$this, $method];
        $callable = function () use ($handler) {
            list($response, $status) = call_user_func_array($handler, func_get_args())->wait();
            if ($status->code == \Google\Rpc\Code::OK) {
                return $response;
            } else {
                throw ApiException::createFromStdClass($status);
            }
        };
        return $this->createCallStack($callable, $settings, $options);
    }

    public function __call($name, $arguments)
    {
        $metadata = [];
        $options = [];
        list($request, $optionalArgs) = $arguments;

        if (array_key_exists('headers', $optionalArgs)) {
            $metadata = $optionalArgs['headers'];
        }

        $newArgs = [$request, $metadata, $optionalArgs];
        return call_user_func_array([$this->stub, $name], $newArgs);
    }
}
