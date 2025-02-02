<?php

namespace AsyncAws\CodeDeploy\Exception;

use AsyncAws\Core\Exception\Http\ClientException;

/**
 * The named revision does not exist with the IAM user or Amazon Web Services account.
 */
final class RevisionDoesNotExistException extends ClientException
{
}
