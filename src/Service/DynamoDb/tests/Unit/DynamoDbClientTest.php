<?php

namespace AsyncAws\DynamoDb\Tests\Unit;

use AsyncAws\Core\Credentials\NullProvider;
use AsyncAws\Core\Test\TestCase;
use AsyncAws\DynamoDb\DynamoDbClient;
use AsyncAws\DynamoDb\Enum\KeyType;
use AsyncAws\DynamoDb\Input\BatchGetItemInput;
use AsyncAws\DynamoDb\Input\BatchWriteItemInput;
use AsyncAws\DynamoDb\Input\CreateTableInput;
use AsyncAws\DynamoDb\Input\DeleteItemInput;
use AsyncAws\DynamoDb\Input\DeleteTableInput;
use AsyncAws\DynamoDb\Input\DescribeTableInput;
use AsyncAws\DynamoDb\Input\ExecuteStatementInput;
use AsyncAws\DynamoDb\Input\GetItemInput;
use AsyncAws\DynamoDb\Input\ListTablesInput;
use AsyncAws\DynamoDb\Input\PutItemInput;
use AsyncAws\DynamoDb\Input\QueryInput;
use AsyncAws\DynamoDb\Input\ScanInput;
use AsyncAws\DynamoDb\Input\TransactWriteItemsInput;
use AsyncAws\DynamoDb\Input\UpdateItemInput;
use AsyncAws\DynamoDb\Input\UpdateTableInput;
use AsyncAws\DynamoDb\Input\UpdateTimeToLiveInput;
use AsyncAws\DynamoDb\Result\BatchGetItemOutput;
use AsyncAws\DynamoDb\Result\BatchWriteItemOutput;
use AsyncAws\DynamoDb\Result\CreateTableOutput;
use AsyncAws\DynamoDb\Result\DeleteItemOutput;
use AsyncAws\DynamoDb\Result\DeleteTableOutput;
use AsyncAws\DynamoDb\Result\DescribeTableOutput;
use AsyncAws\DynamoDb\Result\ExecuteStatementOutput;
use AsyncAws\DynamoDb\Result\GetItemOutput;
use AsyncAws\DynamoDb\Result\ListTablesOutput;
use AsyncAws\DynamoDb\Result\PutItemOutput;
use AsyncAws\DynamoDb\Result\QueryOutput;
use AsyncAws\DynamoDb\Result\ScanOutput;
use AsyncAws\DynamoDb\Result\TableExistsWaiter;
use AsyncAws\DynamoDb\Result\TableNotExistsWaiter;
use AsyncAws\DynamoDb\Result\TransactWriteItemsOutput;
use AsyncAws\DynamoDb\Result\UpdateItemOutput;
use AsyncAws\DynamoDb\Result\UpdateTableOutput;
use AsyncAws\DynamoDb\Result\UpdateTimeToLiveOutput;
use AsyncAws\DynamoDb\ValueObject\AttributeDefinition;
use AsyncAws\DynamoDb\ValueObject\AttributeValue;
use AsyncAws\DynamoDb\ValueObject\KeysAndAttributes;
use AsyncAws\DynamoDb\ValueObject\KeySchemaElement;
use AsyncAws\DynamoDb\ValueObject\Put;
use AsyncAws\DynamoDb\ValueObject\TimeToLiveSpecification;
use AsyncAws\DynamoDb\ValueObject\TransactWriteItem;
use AsyncAws\DynamoDb\ValueObject\WriteRequest;
use Symfony\Component\HttpClient\MockHttpClient;

class DynamoDbClientTest extends TestCase
{
    public function testBatchGetItem(): void
    {
        $client = new DynamoDbClient([], new NullProvider(), new MockHttpClient());

        $input = new BatchGetItemInput([
            'RequestItems' => ['change me' => new KeysAndAttributes([
                'Keys' => [['change me' => new AttributeValue([])]],
            ])],
        ]);
        $result = $client->BatchGetItem($input);

        self::assertInstanceOf(BatchGetItemOutput::class, $result);
        self::assertFalse($result->info()['resolved']);
    }

    public function testBatchWriteItem(): void
    {
        $client = new DynamoDbClient([], new NullProvider(), new MockHttpClient());

        $input = new BatchWriteItemInput([
            'RequestItems' => ['change me' => [new WriteRequest([

            ])]],

        ]);
        $result = $client->BatchWriteItem($input);

        self::assertInstanceOf(BatchWriteItemOutput::class, $result);
        self::assertFalse($result->info()['resolved']);
    }

    public function testCreateTable(): void
    {
        $client = new DynamoDbClient([], new NullProvider(), new MockHttpClient());

        $input = new CreateTableInput([
            'AttributeDefinitions' => [
                new AttributeDefinition(['AttributeName' => 'ForumName', 'AttributeType' => 'S']),
            ],
            'TableName' => 'Foobar',
            'KeySchema' => [
                new KeySchemaElement(['AttributeName' => 'ForumName', 'KeyType' => KeyType::HASH]),
                new KeySchemaElement(['AttributeName' => 'Subject', 'KeyType' => KeyType::RANGE]),
            ],

        ]);
        $result = $client->CreateTable($input);

        self::assertInstanceOf(CreateTableOutput::class, $result);
        self::assertFalse($result->info()['resolved']);
    }

    public function testDeleteItem(): void
    {
        $client = new DynamoDbClient([], new NullProvider(), new MockHttpClient());

        $input = new DeleteItemInput([
            'TableName' => 'Foobar',
            'Key' => ['ID' => ['S' => 'foobar']],
        ]);
        $result = $client->DeleteItem($input);

        self::assertInstanceOf(DeleteItemOutput::class, $result);
        self::assertFalse($result->info()['resolved']);
    }

    public function testDeleteTable(): void
    {
        $client = new DynamoDbClient([], new NullProvider(), new MockHttpClient());

        $input = new DeleteTableInput([
            'TableName' => 'Foobar',
        ]);
        $result = $client->DeleteTable($input);

        self::assertInstanceOf(DeleteTableOutput::class, $result);
        self::assertFalse($result->info()['resolved']);
    }

    public function testDescribeTable(): void
    {
        $client = new DynamoDbClient([], new NullProvider(), new MockHttpClient());

        $input = new DescribeTableInput([
            'TableName' => 'Foobar',
        ]);
        $result = $client->DescribeTable($input);

        self::assertInstanceOf(DescribeTableOutput::class, $result);
        self::assertFalse($result->info()['resolved']);
    }

    public function testExecuteStatement(): void
    {
        $client = new DynamoDbClient([], new NullProvider(), new MockHttpClient());

        $input = new ExecuteStatementInput([
            'Statement' => 'change me',

        ]);
        $result = $client->executeStatement($input);

        self::assertInstanceOf(ExecuteStatementOutput::class, $result);
        self::assertFalse($result->info()['resolved']);
    }

    public function testGetItem(): void
    {
        $client = new DynamoDbClient([], new NullProvider(), new MockHttpClient());

        $input = new GetItemInput([
            'TableName' => 'Foobar',
            'Key' => ['ID' => ['S' => 'foobar']],
        ]);
        $result = $client->GetItem($input);

        self::assertInstanceOf(GetItemOutput::class, $result);
        self::assertFalse($result->info()['resolved']);
    }

    public function testListTables(): void
    {
        $client = new DynamoDbClient([], new NullProvider(), new MockHttpClient());

        $input = new ListTablesInput([

        ]);
        $result = $client->ListTables($input);

        self::assertInstanceOf(ListTablesOutput::class, $result);
        self::assertFalse($result->info()['resolved']);
    }

    public function testPutItem(): void
    {
        $client = new DynamoDbClient([], new NullProvider(), new MockHttpClient());

        $input = new PutItemInput([
            'TableName' => 'Foobar',
            'Key' => ['ID' => ['S' => 'foobar']],
            'Item' => [
                'Name' => ['S' => 'Amazon DynamoDB'],
            ],
        ]);
        $result = $client->PutItem($input);

        self::assertInstanceOf(PutItemOutput::class, $result);
        self::assertFalse($result->info()['resolved']);
    }

    public function testQuery(): void
    {
        $client = new DynamoDbClient([], new NullProvider(), new MockHttpClient());

        $input = new QueryInput([
            'TableName' => 'Foobar',

        ]);
        $result = $client->Query($input);

        self::assertInstanceOf(QueryOutput::class, $result);
        self::assertFalse($result->info()['resolved']);
    }

    public function testScan(): void
    {
        $client = new DynamoDbClient([], new NullProvider(), new MockHttpClient());

        $input = new ScanInput([
            'TableName' => 'Foobar',

        ]);
        $result = $client->Scan($input);

        self::assertInstanceOf(ScanOutput::class, $result);
        self::assertFalse($result->info()['resolved']);
    }

    public function testTableExists(): void
    {
        $client = new DynamoDbClient([], new NullProvider(), new MockHttpClient());

        $input = new DescribeTableInput([
            'TableName' => 'Foobar',

        ]);
        $result = $client->tableExists($input);

        self::assertInstanceOf(TableExistsWaiter::class, $result);
        self::assertFalse($result->info()['resolved']);
    }

    public function testTableNotExists(): void
    {
        $client = new DynamoDbClient([], new NullProvider(), new MockHttpClient());

        $input = new DescribeTableInput([
            'TableName' => 'Foobar',

        ]);
        $result = $client->tableNotExists($input);

        self::assertInstanceOf(TableNotExistsWaiter::class, $result);
        self::assertFalse($result->info()['resolved']);
    }

    public function testTransactWriteItems(): void
    {
        $client = new DynamoDbClient([], new NullProvider(), new MockHttpClient());

        $input = new TransactWriteItemsInput([
            'TransactItems' => [
                new TransactWriteItem([
                    'Put' => new Put([
                        'TableName' => 'Foobar',
                        'Key' => ['ID' => ['S' => 'foobar']],
                        'Item' => [
                            'Name' => ['S' => 'Amazon DynamoDB'],
                        ],
                    ]),
                ]),
            ],
        ]);
        $result = $client->transactWriteItems($input);

        self::assertInstanceOf(TransactWriteItemsOutput::class, $result);
        self::assertFalse($result->info()['resolved']);
    }

    public function testUpdateItem(): void
    {
        $client = new DynamoDbClient([], new NullProvider(), new MockHttpClient());

        $input = new UpdateItemInput([
            'TableName' => 'Foobar',
            'Key' => ['ID' => ['S' => 'foobar']],
        ]);
        $result = $client->UpdateItem($input);

        self::assertInstanceOf(UpdateItemOutput::class, $result);
        self::assertFalse($result->info()['resolved']);
    }

    public function testUpdateTable(): void
    {
        $client = new DynamoDbClient([], new NullProvider(), new MockHttpClient());

        $input = new UpdateTableInput([
            'TableName' => 'Foobar',
        ]);
        $result = $client->UpdateTable($input);

        self::assertInstanceOf(UpdateTableOutput::class, $result);
        self::assertFalse($result->info()['resolved']);
    }

    public function testUpdateTimeToLive(): void
    {
        $client = new DynamoDbClient([], new NullProvider(), new MockHttpClient());

        $input = new UpdateTimeToLiveInput([
            'TableName' => 'Foobar',
            'TimeToLiveSpecification' => new TimeToLiveSpecification([
                'Enabled' => false,
                'AttributeName' => 'attribute',
            ]),
        ]);
        $result = $client->updateTimeToLive($input);

        self::assertInstanceOf(UpdateTimeToLiveOutput::class, $result);
        self::assertFalse($result->info()['resolved']);
    }
}
