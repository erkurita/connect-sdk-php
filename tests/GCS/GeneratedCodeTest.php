<?php
namespace GCS;

/**
 * Class GeneratedCodeTest
 *
 * @package GCS
 * @group   generated_code
 */
class GeneratedCodeTest extends ClientTestCase
{
    public function testJsonMarshalling()
    {
        $errorResponse = new Errors\ErrorResponse();
        $errorResponse->errorId = '123';
        $apiError = new Errors\Definitions\APIError();
        $apiError->code = '1';
        $apiError->message = 'Test message';
        $apiError->propertyName = 'test';
        $errorResponse->errors = array($apiError);
        $jsonErrorResponse = $errorResponse->toJson();
        $this->assertEquals($jsonErrorResponse, json_encode($errorResponse));
        $actualErrorResponse = new Errors\ErrorResponse();
        $actualErrorResponse->fromJson($jsonErrorResponse);
        $this->assertEquals($errorResponse, $actualErrorResponse);
    }

    public function testCreateSessionsPost()
    {

        $client = $this->getClient();
        $client->setClientMetaInfo('{ "test": "test" }');
        $merchant = $client->merchant('9991');
        $sessionRequest = new sessions\SessionRequest();
        $sessionRequest->tokens = array('e7303c8c-8b18-4929-9ae9-63d37575c352');
        try {
            $sessions = $merchant->sessions();
            $response = $sessions->create($sessionRequest);
            $this->assertInstanceOf('\GCS\Sessions\SessionResponse', $response);
        } catch (InvalidResponseException $e) {
            print_r($e->getMessage(). PHP_EOL);
            print_r($e->getCode() . PHP_EOL);
            print_r($e->getResponse());
            throw $e;
        } catch (GlobalCollectException $e) {
            print_r($e->getMessage(). PHP_EOL);
            print_r($e->getCode() . PHP_EOL);
            print_r($e->getResponse());
            throw $e;
        } catch (\Exception $e) {
            print_r($e);
            throw $e;
        }
    }

    public function testMerchant()
    {
        $client = $this->getClient();
        $merchant = $client->merchant('9991');
        $productQuery = new Merchant\Products\FindParams();
        $productQuery->amount = 1000;
        $productQuery->currencyCode = 'EUR';
        $productQuery->orderType = 'normal';
        $productQuery->countryCode = 'NL';

        try {
            $result = $merchant->products()->find($productQuery);
            $this->assertInstanceOf('\GCS\Product\PaymentProducts', $result);
            $paymentProducts = $result->paymentProducts;
            foreach ($paymentProducts as $paymentProduct) {
                $this->assertNotEmpty($paymentProduct->id);
            }
        } catch (InvalidResponseException $e) {
            print_r($e->getMessage(). PHP_EOL);
            print_r($e->getCode() . PHP_EOL);
            print_r($e->getResponse());
            throw $e;
        } catch (GlobalCollectException $e) {
            print_r($e->getMessage(). PHP_EOL);
            print_r($e->getCode() . PHP_EOL);
            print_r($e->getResponse());
            throw $e;
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function testProducts()
    {
        $client = $this->getClient();
        $merchant = $client->merchant(9991);
        try {
            $result = $merchant->products();
            $this->assertInstanceOf('\GCS\Merchant\Products', $result);
        } catch (InvalidResponseException $e) {
            print_r($e->getMessage(). PHP_EOL);
            print_r($e->getCode() . PHP_EOL);
            print_r($e->getResponse());
            throw $e;
        } catch (GlobalCollectException $e) {
            print_r($e->getMessage(). PHP_EOL);
            print_r($e->getCode() . PHP_EOL);
            print_r($e->getResponse());
            throw $e;
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function testConvertAmountGet()
    {
        $client = $this->getClient();
        $client->setClientMetaInfo('{ "test": "test" }');
        $merchant = $client->merchant(9991);

        $amountParameters = new Merchant\Services\ConvertAmountParams();
        $amountParameters->amount = 100;
        $amountParameters->source = 'EUR';
        $amountParameters->target = 'USD';
        try {
            $result = $merchant->services()->convertAmount($amountParameters);
            $this->assertInstanceOf('\GCS\Services\ConvertAmount', $result);
        } catch (InvalidResponseException $e) {
            print_r($e->getMessage(). PHP_EOL);
            print_r($e->getCode() . PHP_EOL);
            print_r($e->getResponse());
            throw $e;
        } catch (GlobalCollectException $e) {
            print_r($e->getMessage(). PHP_EOL);
            print_r($e->getCode() . PHP_EOL);
            print_r($e->getResponse());
            throw $e;
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function testProxyConvertAmountGet()
    {
        $client = $this->getProxyClient();
        $merchant = $client->merchant(9991);

        $amountParameters = new Merchant\Services\ConvertAmountParams();
        $amountParameters->amount = 100;
        $amountParameters->source = 'EUR';
        $amountParameters->target = 'USD';
        try {
            $result = $merchant->services()->convertAmount($amountParameters);
            $this->assertInstanceOf('\GCS\Services\ConvertAmount', $result);
        } catch (InvalidResponseException $e) {
            print_r($e->getMessage(). PHP_EOL);
            print_r($e->getCode() . PHP_EOL);
            print_r($e->getResponse());
            throw $e;
        } catch (GlobalCollectException $e) {
            print_r($e->getMessage(). PHP_EOL);
            print_r($e->getCode() . PHP_EOL);
            print_r($e->getResponse());
            throw $e;
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function testHostedCheckout()
    {
        $client = $this->getClient();
        $merchant = $client->merchant(8915);
        $body = new hostedcheckout\CreateHostedCheckoutRequest();
        $body->order = new Payment\Definitions\Order();
        $body->order->amountOfMoney = new Fei\Definitions\AmountOfMoney();
        $body->order->amountOfMoney->currencyCode = 'EUR';
        $body->order->amountOfMoney->amount = 2345;
        $body->order->customer = new Payment\Definitions\Customer();
        $body->order->customer->billingAddress = new Fei\Definitions\Address();
        $body->order->customer->billingAddress->countryCode = 'NL';
        try {
            $result = $merchant->hostedcheckouts()->create($body);
            $this->assertInstanceOf('\GCS\HostedCheckout\CreateHostedCheckoutResponse', $result);
        } catch (InvalidResponseException $e) {
            print_r($e->getMessage(). PHP_EOL);
            print_r($e->getCode() . PHP_EOL);
            print_r($e->getResponse());
            throw $e;
        } catch (GlobalCollectException $e) {
            print_r($e->getMessage(). PHP_EOL);
            print_r($e->getCode() . PHP_EOL);
            print_r($e->getResponse());
            throw $e;
        } catch (ReferenceException $e) {
            print_r($e->getMessage(). PHP_EOL);
            print_r($e->getCode() . PHP_EOL);
            print_r($e->getResponse());
            throw $e;
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function testCreateUpdateDeleteTokenCardMinimal()
    {
        $client = $this->getClient();
        $merchant = $client->merchant('9991');
        $request = new token\CreateTokenRequest();

        $request->card = new Token\Definitions\TokenCard();
        $request->card->data = new Token\Definitions\TokenCardData();
        $request->card->data->cardWithoutCvv = new Fei\Definitions\CardWithoutCvv();
        $request->card->data->cardWithoutCvv->cardNumber = '4567350000427977';
        $request->card->data->cardWithoutCvv->expiryDate = '0820';
        $request->card->customer = new Token\Definitions\CustomerToken();
        $request->card->customer->billingAddress = new Fei\Definitions\Address();
        $request->card->customer->billingAddress->countryCode = 'NL';
        $request->paymentProductId = 1;
        try {
            $createTokenResponse = $merchant->tokens()->create($request);
            $this->assertInstanceOf('\GCS\Token\CreateTokenResponse', $createTokenResponse);

            $tokenUpdate = new token\UpdateTokenRequest();
            $tokenUpdate->paymentProductId = 1;
            $tokenUpdate->card = $request->card;
            $tokenUpdate->card->customer->billingAddress->countryCode = 'BE';
            $merchant->tokens()->update($createTokenResponse->token, $tokenUpdate);
            $updateResponse = $merchant->tokens()->get($createTokenResponse->token);
            $this->assertInstanceOf('\GCS\Token\TokenResponse', $updateResponse);
            $this->assertEquals('BE', $updateResponse->card->customer->billingAddress->countryCode);

            $tokenCancelParameters = new Merchant\Tokens\DeleteParams();
            $tokenCancelParameters->mandateCancelDate = '20130130';
            $cancel = $merchant->tokens()->delete($createTokenResponse->token, $tokenCancelParameters);
            $this->assertEmpty($cancel);

            try {
                $this->assertEmpty($merchant->tokens()->delete($createTokenResponse->token, $tokenCancelParameters));
            } catch (ReferenceException $e) {
                $this->assertEquals(404, $e->getHttpStatusCode());
            }

        } catch (GlobalCollectException $e) {
            print_r($e->getMessage(). PHP_EOL);
            print_r($e->getCode() . PHP_EOL);
            print_r($e->getResponse());
            throw $e;
        }
    }

    public function testCancelMissingPayment()
    {
        try {
            $client = $this->getClient();
            $merchant = $client->merchant(8910);
            $merchant->payments()->cancel('000000891000000000010000100001');
        } catch (ReferenceException $e) {
            $this->assertInstanceOf('\GCS\Errors\ErrorResponse', $e->getResponse());
        }

    }
}
