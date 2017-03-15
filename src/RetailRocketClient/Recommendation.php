<?php

namespace RetailRocketClient;
use RetailRocketClient\Recommendation\Response;

class Recommendation {

    /**
     * @var ClientInterface
     */
    protected $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @param string $method
     * @param array $params
     *
     * @return array
     */
    protected function request($method, array $params)
    {
        return $this->createResponse($this->client->request("recommendation/$method", $params));
    }

    /**
     * @param array $data
     *
     * @return Recommendation\Response
     */
    protected function createResponse(array $data)
    {
        return new Response($data);
    }

    /**
     * Популярные товары магазина, персонализированные для пользователя
     * @param string $session - анонимизированный идентификатор пользователя. Содержится в cookie rcuid.
     * @return Response
     */
    public function personalizedPopular($session)
    {
        return $this->request('personalized/popular', ['session' => $session]);
    }

    /**
     * Новинки магазина, персонализированные для пользователя
     * @param string $session - анонимизированный идентификатор пользователя. Содержится в cookie rcuid.
     * @return Response
     */
    public function personalizedLatest($session)
    {
        return $this->request('personalized/latest', ['session' => $session]);
    }

    /**
     * Популярные товары магазина
     *
     * Можно фильтровать по категории или производителю.
     *
     * @param string|array $categoryIds - идентификатор товарной категории магазина. Используйте значение 0 для всего каталога магазина.
     * @param string $vendor - название бренда. Должен совпадать со значением поля vendor в YML или Product API.
     * @return Response
     */
    public function popular($categoryIds, $vendor = null)
    {
        $params = ['categoryIds' => implode(',', (array) $categoryIds)];

        if($vendor) {
            $params['vendor'] = $vendor;
        }

        return $this->request('popular', $params);
    }

    /**
     * Популярные товары магазина, имеющие скидку
     *
     * Для получения бестселлеров со скидкой необходимо передавать
     * информации о товарах параметр oldprice, со значениемменьше price,
     * и сделать запрос к методу Sale By Popular.
     *
     * @param $categoryIds
     * @return Response
     */
    public function saleByPopular($categoryIds = 0)
    {
        return $this->request('saleByPopular', ['categoryIds' => $categoryIds]);
    }

    /**
     * Новинки магазина, имеющие скидку
     *
     * Для получения бестселлеров со скидкой необходимо передавать
     * информации о товарах параметр oldprice, со значениемменьше price,
     * и сделать запрос к методу Sale By Popular.
     *
     * @param int $categoryIds
     * @return Response
     */
    public function saleByLatest($categoryIds = 0)
    {
        return $this->request('saleByLatest', ['categoryIds' => $categoryIds]);
    }

    /**
     * Альтернативные товары для карточки товара
     *
     * Алгоритм возвращает похожие товарные позиции, которые заинтересуют пользователя,
     * взаимодействующего с товаром, переданным на вход, с максимальной вероятностью.
     *
     * @param string $itemIds - идентификатор товара, для которого нужно получить рекомендации.
     *                        Должен совпадать с ID, передаваемым вмета-данных о товаре.
     * @return Response
     */
    public function alternative($itemIds)
    {
        return $this->request('alternative', ['itemIds' => $itemIds]);
    }

    /**
     * Сопутствующие товары для карточки товара
     *
     * Алгоритм возвращает сопутствующие товарные позиции, которые с максимальной вероятностью
     * могут быть куплены вместе с товаром, переданным на вход.
     *
     * @param array $itemIds - идентификатор товара для которого нужно получитьрекомендации.
     *                       Должен совпадать с ID, передаваемым в мета-данных о товаре.
     * @param array $params - дополнительные параметры
     * @return Response
     */
    public function related(array $itemIds, array $params = [])
    {
        $params = array_merge(['itemIds' => implode(',', $itemIds)], $params);

        return $this->request('related', $params);
    }

    /**
     * Персональные рекомендации
     * Алгоритм персональных рекомендаций возвращает наиболее интересные товары для пользователя
     *
     * @param $partnerUserSessionId - анонимизированный идентификатор пользователя. Содержится в cookie rcuid.
     * @return Response
     */
    public function personal($partnerUserSessionId)
    {
        return $this->request('personal', ['partnerUserSessionId' => $partnerUserSessionId]);
    }

    /**
     * Поисковые рекомендации
     *
     * Система Retail Rocket предоставляет рекомендации на основе ключевых слов,
     * которые пользователи запрашивают во внутреннем поиске по сайту интернет-магазина.
     * Поисковые рекомендации следует применять на странице результатов внутреннего поиска
     *
     * @param string $phrase - поисковый запрос пользователя.
     *
     * @return Response
     */
    public function search($phrase)
    {
        return $this->request('search', ['phrase' => $phrase]);
    }
} 